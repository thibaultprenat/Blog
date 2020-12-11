<?php

namespace App\Http\Controllers;
use App\Models\Models\Post;
use App\Models\Commentaire;

use Illuminate\Http\Request;

class CommentaireController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Post $post)
    {
        request()->validate([
            'contenu' => 'required|min:2'

        ]);

        $comment = new Commentaire();
        $comment->contenu = request('contenu');
        $comment->user_id = auth()->user()->id;

        $post->comments()->save($comment);

        return redirect()->route('Post', $post);
    }

    public function destroy(Commentaire $comment)
    {
        Commentaire::destroy($comment->id);

        return back();
    }

}
