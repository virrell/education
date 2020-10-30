<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use GuzzleHttp\Psr7\Request;

Route::get('/', function () {
    return view('welcome');
});

//Route::get('posts', [PostController::class, 'getAllPosts'])->middleware('auth:sanctum')->name('posts');
Route::get('post/update/{id}', [PostController::class, 'showPostUpdateForm'])->middleware('auth:sanctum')->name('update-post-form');

Route::get('post/create', [PostController::class, 'showCreatePostForm'])->middleware('auth:sanctum')->name('create-post-form');

Route::post('/post/submit', [PostController::class, 'createPost'])->name('create-post');

Route::post('/posts/update/{id}/submit', [PostController::class, 'updatePost'])->name('post-update');
Route::post('/posts/{id}/delete', [PostController::class, 'deletePost'])->name('post-delete');

Route::middleware('auth:sanctum')->get('/dashboard', [PostController::class, 'getAllPosts'])->name('dashboard');