<?php

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {

    // \Illuminate\Support\Facades\DB::listen(function ($query) {
    //     logger($query->sql, $query->bindings); //Ver SQL queries en storage/logs/laravel.log (Es mejor Clockwork)
    // });

    //$posts = Post::all();
    //$posts = Post::with('category', 'author')->latest()->get();
    $posts = Post::latest()->get();
    return view('posts', [
        'posts' => $posts,
    ]);
});

Route::get('/posts/{post:slug}', function (Post $post) { //Post::where('slug', $post)->firstOrFail()
    return view('post', [
        'post' => $post,
    ]);
}); //where, or whereAlpha, whereNumber, whereAlphaNumeric

Route::get('categories/{category:slug}', function (Category $category) {
    return view('posts', [
        //'posts' => $category->posts->load(['category', 'author']),
        'posts' => $category->posts,
    ]);
});

Route::get('authors/{author:username}', function (User $author) {
    return view('posts', [
        //'posts' => $author->posts->load(['category', 'author']),
        'posts' => $author->posts,
    ]);
});