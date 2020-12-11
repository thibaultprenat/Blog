<?php

namespace App\Http\Controllers;
use App\Models\Post;
use App\Models\Commentaire;

use Illuminate\Http\Request;

class CommentaireController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(request $request)
    {

        $valid = $request->validate([
            'contenu' => 'required|min:2',
            'post_id' => 'exists:post,id'

        ]);
        $comment = new Commentaire();
        $comment->contenu = $valid['contenu'];
        $comment->post_id = $valid['post_id'];
        $comment->user_id = auth()->user()->id;
        $comment->save();

        return Back();
    }

    public function destroy(Commentaire $comment)
    {
        Commentaire::destroy($comment->id);

        return back();
    }

}
