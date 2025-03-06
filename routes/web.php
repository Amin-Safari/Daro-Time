<?php

use App\Http\Controllers\SingUpController;
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
route::resource('/singup', SingUpController::class);