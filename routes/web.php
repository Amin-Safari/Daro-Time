<?php

use App\Http\Controllers\SignUpController;
use App\Http\Controllers\SignInController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
 
});
Route::get('/abuot', function () {
    return view('welcome');
});
Route::get('/dashboard', function () {
    return view('welcome');
});
Route::get('/signup', [SignUpController::class , 'index'])->name('signup.index');

Route::post('/sinagup', [SignUpController::class , 'signup'])->name('signup');

Route::get('/signin', [SignInController::class , 'index'])->name('signin.index');

Route::post('/sinagin', [SignInController::class , 'signin'])->name('signin');