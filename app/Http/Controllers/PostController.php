<?php

namespace App\Http\Controllers;

use App\Models\Post;

class PostController extends Controller
{
    public function index() 
    {
        return view('posts.index', [
            'posts' => Post::latest()
                            ->with('category', 'author:id,name,username')
                            ->filter(request()->only(['search', 'category', 'author']))
                            ->paginate(6)->withQueryString(),
        ]);
    }

    public function show(Post $post)
    {
        return view('posts.show', [
            'post' => $post->load([
                'comments' => fn($query) => $query->latest() 
            ])
        ]);
    }
}
