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
                            ->filter(request()->only('search'))
                            ->get(),
            'categories' => Category::all()
        ]);
    }

    public function show(Post $post)
    {
        // $categories = Category::all();
        // return view('posts.show', compact('post', 'categories'));
        return view('posts.show', compact('post'));
    }
}
