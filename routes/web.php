<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use GuzzleHttp\Psr7\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::get('welcome', function () {
    return view('welcome');
});

Route::get('posts', [PostController::class, 'getAllPosts'])->name('posts');
Route::get('posts/{id}', [PostController::class, 'getPost'])->name('post');

Route::get('post/create', function(){
    return view('create-post');
});


Route::post('/post/submit', [PostController::class, 'createPost'])->name('create-post');
Route::post('/posts/{id}', [PostController::class, 'updatePost'])->name('post-update');
Route::post('/posts/{id}/delete', [PostController::class, 'deletePost'])->name('post-delete');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/', function () {
    route('posts');
});