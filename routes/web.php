<?php

use App\Http\Controllers\MedicineController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SignUpController;
use App\Http\Controllers\SignInController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
 
})->name('welcome');

Route::get('/abuot', function () {
    return view('welcome');
});

Route::get('/dashboard', [MedicineController::class,'index'])->name('dashboard.index');

Route::get('/signup', [SignUpController::class , 'index'])->name('signup.index');

Route::post('/sinagup', [SignUpController::class , 'signup'])->name('signup');

Route::get('/signin', [SignInController::class , 'index'])->name('signin.index');

Route::post('/sinagin', [SignInController::class , 'signin'])->name('signin');

Route::get('/register/{token}',[RegisterController::class, 'form'])->name('register.pass');

Route::post('/register/resetpass',[RegisterController::class, 'pass'])->name('register.send');

Route::get('/register',[RegisterController::class, 'index'])->name('register.index');

Route::post('/register',[RegisterController::class, 'register'])->name('register');

Route::get('/user',[UserController::class, 'index'])->name('user.index');

Route::patch('/user/update', [UserController::class, 'update'])->name('user.update');

Route::get('/user/logout',[UserController::class, 'logout'])->name('user.logout');

Route::post('/add-medicine', [MedicineController::class, 'store'])->name('add-medicine');

Route::get('/active-drugs', [MedicineController::class, 'getActiveDrugs']);
