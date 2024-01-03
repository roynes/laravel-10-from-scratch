<?php

use App\Http\Controllers\AdminPostController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\PostCommentsController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use Illuminate\Support\Facades\Route;

Route::get('/admin/posts/create', [AdminPostController::class, 'create'])
    ->name('post.create')
    ->middleware('admin');

Route::get('/admin/posts', [AdminPostController::class, 'index'])
    ->name('post.index')
    ->middleware('admin');
Route::post('/admin/posts', [AdminPostController::class, 'store'])
    ->name('post.store')
    ->middleware('admin');
    
Route::get('admin/posts/{post}/edit', [AdminPostController::class, 'edit'])
    ->name('post.edit')
    ->middleware('admin');
Route::patch('admin/posts/{post}', [AdminPostController::class, 'update'])
    ->name('post.update')
    ->middleware('admin');
Route::delete('admin/posts/{post}', [AdminPostController::class, 'destroy'])
    ->name('post.delete')
    ->middleware('admin');


Route::post('/newsletter', NewsletterController::class);

Route::post('/posts/{post:slug}/comment', [PostCommentsController::class, 'store'])
    ->name('post.comment')
    ->middleware('auth');
Route::get('/posts/{post:slug}', [PostController::class, 'show'])
    ->name('post.show');
Route::get('/', [PostController::class, 'index'])
    ->name('home');

Route::post('/register', [RegisterController::class, 'store'])
    ->name('register.store')
    ->middleware('guest');
Route::get('/register', [RegisterController::class, 'create'])
    ->name('register')
    ->middleware('guest');

Route::get('/login', [SessionsController::class, 'create'])
    ->name('login')
    ->middleware('guest');
Route::post('/login', [SessionsController::class, 'store'])
    ->name('create.sessions')
    ->middleware('guest');
Route::post('/logout', [SessionsController::class, 'destroy'])
    ->name('logout')
    ->middleware('auth');