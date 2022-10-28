<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;

Route::get('ping', function () {
    $mailchimp = new \MailchimpMarketing\ApiClient();

    $mailchimp->setConfig([
        'apiKey' => config('services.mailchimp.key'),
        'server' => 'us14'
    ]);

    //$response = $mailchimp->lists->getAllLists();
    // $response = $mailchimp->lists->getList('93659e24b4');
    // $response = $mailchimp->lists->getListMembersInfo('93659e24b4');
    $response = $mailchimp->lists->addListMember('93659e24b4', [
        'email_address' => 'tommy@gmail.com',
        'status' => 'subscribed'
    ]);
    ddd($response);
});

Route::get('/', [PostController::class, 'index'])->name('home');
Route::get('/posts/{post:slug}', [PostController::class, 'show'])->name('post'); //where, or whereAlpha, whereNumber, whereAlphaNumeric
Route::post('/posts/{post:slug}/comments', [CommentController::class, 'store']);

Route::get('/register', [RegisterController::class, 'create'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store'])->middleware('guest');

Route::get('/login', [SessionsController::class, 'create'])->middleware('guest');
Route::post('/login', [SessionsController::class, 'store'])->middleware('guest');

Route::post('/logout', [SessionsController::class, 'destroy'])->middleware('auth');