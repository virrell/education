<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

use GuzzleHttp\Psr7\Request;

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => ['auth:sanctum']], function() {
    Route::resource('post', PostController::class);
});

Route::redirect('/dashboard', route('post.index'))->name('dashboard');
