<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index() 
    {
        return view('posts.index', [
            'posts' => Post::latest()
                            ->with('category', 'author')
                            ->filter(request()->only(['search', 'category']))
                            ->get(),
        ]);
    }

    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }
}
