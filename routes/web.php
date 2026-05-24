<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
Route::get('/', function () {
    return view('auth.register');
});
Route::get('/loginForm', function () {
    return view('auth.login');
})->name('loginForm');
Route::resource('posts',PostController::class);
Route::post('/register',[AuthController::class,'register'])->name('register');
Route::post('/login',[AuthController::class,'login'])->name('login');
Route::post('/logout',[AuthController::class,'logout'])->name('logout');
Route::post('/comments',[CommentController::class,'storeComment'])->name('comments.store');
Route::get('/add/comment',function(){
    return view('stuffs.comment');
})->name('addComment');