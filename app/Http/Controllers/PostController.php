<?php

namespace App\Http\Controllers;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index(){
        $posts=Post::all();
        return view('posts', compact('posts')); 
    }

    public function show(Post $post)
    {
        return view('Post', compact('post'));
    }

    public function view($id){
        $post = Post::where('id', $id)->firstOrFail();
        return view('Post', compact('post'));
     }

     public function edit($id){
        $post = Post::where('id', $id)->firstOrFail();
        return view('post-edit', compact('post'));
     }

     public function update($id, Request $request){
        $post = Post::where('id', $id)->firstOrFail(); /* trouve l'entrée en DB */
        $post->update($request->only(['title', 'content'])); /*récupère les valeurs suivantes */
        return redirect()->back(); /* redirige vers la vue d'édition */
     }

     public function create(){
        $post = new Post();
        return view('post-create', compact('post'));
     }

     public function insert(Request $request){
      if (Auth::check()){
         $post = new Post();
         $inputs = $request->input();
         $inputs['user_id'] = Auth::user()->id;
         $post = Post::create($inputs);
      } 
      return redirect()->back();
   }

   public function delete($id){
      Post::destroy($id);
      return redirect()->action('PostController@index');
   }
}
