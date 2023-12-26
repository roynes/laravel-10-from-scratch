<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::get('/posts/{post:slug}', [PostController::class, 'show'])->name('post.show');
Route::get('/', [PostController::class, 'index'])->name('home');