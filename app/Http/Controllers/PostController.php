<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Stringable;

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
            'post' => $post->loadMissing([
                'comments' => fn($query) => $query->latest() 
            ])
        ]);
    }

    public function create()
    {
        return view('posts.create', [
            'categories' => Category::all()
        ]);
    }

    public function store(Post $post)
    {
        $attributes = request()->validate([
            'body' => 'required',
            'title' => 'required|min:5|max:255',
            'excerpt' => 'required|min:5|max:350',
            'category_id' => 'required|exists:categories,id'
        ]);

        $attributes['slug'] = $attributes['title'];
        $attributes['user_id'] = auth()->id();

        $post->create($attributes);

        return redirect('/')->with('success', "You've added a new post");
    }
}
