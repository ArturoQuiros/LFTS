<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;

Route::get('/', [PostController::class, 'index'])->name('home');
Route::get('/posts/{post:slug}', [PostController::class, 'show'])->name('post'); //where, or whereAlpha, whereNumber, whereAlphaNumeric

Route::get('/register', [RegisterController::class, 'create']);
Route::post('/register', [RegisterController::class, 'store']);