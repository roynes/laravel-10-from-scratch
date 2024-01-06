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
        $attributes = array_merge($result = $this->validatePost($post), [
            'slug' => $result['title'],
            'user_id' => auth()->id(),
            'thumbnail' => request()->file('thumbnail')?->store('thumbnails'),
            'published_at' => now()
        ]);

        $post->create($attributes);

        return redirect('/')->with('success', "You've added a new post");
    }

    public function update(Post $post)
    {
        $attributes = $this->validatePost($post);

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

    protected function validatePost(?Post $post = null): array
    {
        $post ??= new Post;

        $attributes = [
            'title' => 'required|min:5|max:255',
            'thumbnail' => $post->exists ? 'image|max:5120' :'required|image|max:5120',
            'excerpt' => 'required|min:5|max:255',
            'body' => 'required',
            'category_id' => 'required|exists:categories,id'
        ];

        if(request()->isMethod('patch')) {
            $attributes['slug'] = ['required', Rule::unique('posts', 'slug')->ignore($post->id)];
        }

        return request()->validate($attributes);
    }
}
