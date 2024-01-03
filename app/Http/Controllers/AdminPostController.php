<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Validation\Rule;

class AdminPostController extends Controller
{
    public function index()
    {
        return view('admin.posts.index', [
            'posts' => Post::paginate(50)
        ]);
    }

    public function create()
    {
        return view('admin.posts.create', [
            'categories' => Category::all()
        ]);
    }

    public function edit(Post $post)
    {
        return view('admin.posts.edit', compact('post'));
    }

    public function store(Post $post)
    {
        $attributes = request()->validate([
            'body' => 'required',
            'thumbnail' => 'required|image|max:5120',
            'title' => 'required|min:5|max:255',
            'excerpt' => 'required|min:5|max:255',
            'category_id' => 'required|exists:categories,id'
        ]);

        $thumbnailLink = request()->file('thumbnail')?->store('thumbnails');

        $attributes['slug'] = $attributes['title'];
        $attributes['user_id'] = auth()->id();
        $attributes['thumbnail'] = $thumbnailLink;
        $attributes['published_at'] = now();

        $post->create($attributes);

        return redirect('/')->with('success', "You've added a new post");
    }

    public function update(Post $post)
    {
        $attributes = request()->validate([
            'title' => 'required',
            'thumbnail' => 'image',
            'slug' => ['required', Rule::unique('posts', 'slug')->ignore($post->id)],
            'excerpt' => 'required',
            'body' => 'required',
            'category_id' => ['required', Rule::exists('categories', 'id')]
        ]);

        if (isset($attributes['thumbnail'])) {
            $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnails');
        }

        $post->update($attributes);

        return back()->with('success', 'Post Updated!');
    }

    public function destroy(Post $post)
    {
        $post->delete();

        return back()->with('success', 'Post Deleted!');
    }
}
