<?php

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('posts', [
        'posts' => Post::latest()->get()
    ]);
});

// Route::get('/', [PostController::class, 'index'])->name('home');

Route::get('posts/{post:slug}', function (Post $post) {
    return view('post', [
        'post' => $post
    ]);
});

Route::get('categories/{category:slug}', function (Category $category) {
    return view('post', [
        'category' => $category
    ]);
});

// Route::get('authors/{author:username}', function (User $user) {
//     // return
// });
