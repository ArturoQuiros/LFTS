<?php

use App\Models\Post;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $posts = Post::all();
    return view('posts', [
        'posts' => $posts,
    ]);
});

Route::get('/posts/{post}', function ($slug) {
    $post = Post::findOrFail($slug);
    return view('post', [
        'post' => $post,
    ]);
}); 