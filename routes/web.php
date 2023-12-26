<?php

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/posts/{post:slug}', function (Post $post) {
    $categories = Category::all();
    return view('posts.show', compact('post', 'categories'));
});

Route::get('/posts', function () {
    $posts = Post::latest()->with('category', 'author')->get();

    return view('posts.index', compact('posts'));
});

Route::get('/categories/{category:slug}', function (Category $category) {
    return view('posts.index', [
        'posts' => $category->posts->load('author', 'category')
    ]);
});

Route::get('/authors/{author:username}', function (User $author) {
    return view('posts.index', [
        'posts' => $author->posts->load('author', 'category')
    ]);
});