<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AuthController;
Route::get('/', function () {
    return view('auth.register');
});
Route::get('/loginForm', function () {
    return view('auth.login');
})->name('loginForm');
Route::resource('posts',PostController::class);
Route::post('/register',[AuthController::class,'register'])->name('register');
Route::post('/login',[AuthController::class,'login'])->name('login');
