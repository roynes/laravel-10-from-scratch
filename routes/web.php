<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use Illuminate\Support\Facades\Route;

Route::get('/posts/{post:slug}', [PostController::class, 'show'])->name('post.show');
Route::get('/', [PostController::class, 'index'])->name('home');

Route::post('/register', [RegisterController::class, 'store'])
    ->name('register.store')
    ->middleware('guest');
Route::get('/register', [RegisterController::class, 'create'])
    ->name('register')
    ->middleware('guest');
Route::post('/logout', [SessionsController::class, 'destroy'])
    ->name('logout')
    ->middleware('auth');