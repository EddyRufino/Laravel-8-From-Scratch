<?php

use App\Http\Controllers\AdminPostController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\PostCommentController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PostController::class, 'index']);
Route::get('posts/{post:slug}',           [PostController::class, 'show']);
Route::post('posts/{post:slug}/comments', [PostCommentController::class, 'store']);

// Admin
Route::middleware('can:admin')->group( function () {
    Route::resource('admin/posts', AdminPostController::class)->except('show');
});

Route::post('newsletter', NewsletterController::class);

Route::middleware('guest')->group(function () {
    Route::get('register',  [RegisterController::class, 'create']);
    Route::post('register', [RegisterController::class, 'store']);

    Route::get('login',  [SessionController::class, 'create']);
    Route::post('login', [SessionController::class, 'store']);
});

Route::post('logout', [SessionController::class, 'destroy'])->middleware('auth');
