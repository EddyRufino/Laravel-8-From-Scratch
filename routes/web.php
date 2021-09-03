<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('posts/{post:slug}', function (Post $post) {
    // return
});

Route::get('categories/{category:slug}', function (Category $category) {
    // return
});
