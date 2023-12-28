<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;

class PostCommentsController extends Controller
{
    public function store(Post $post, Comment $comment)
    {
        $attributes = request()->validate([
            'body' => 'required',
        ]);

        $comment->body = $attributes['body'];
        $comment->user_id = auth()->user()->id;
        $comment->post_id = $post->id;
        $comment->save();

        return back()->with('success', 'Added a comment.');
    }
}
