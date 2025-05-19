<?php

use App\Http\Controllers\MedicineController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SignUpController;
use App\Http\Controllers\SignInController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\DrugController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/abuot', function () {
    return view('welcome');
});

Route::get('/dashboard', [MedicineController::class, 'index'])->middleware(['auth'])->name('dashboard.index');

Route::get('/signup', [SignUpController::class, 'index'])->name('signup.index');

Route::post('/sinagup', [SignUpController::class, 'signup'])->name('signup');

Route::get('/signin', [SignInController::class, 'index'])->name('signin.index');

Route::post('/sinagin', [SignInController::class, 'signin'])->name('signin');

Route::get('/register/{token}', [RegisterController::class, 'form'])->name('register.pass');

Route::post('/register/resetpass', [RegisterController::class, 'pass'])->name('register.send');

Route::get('/register', [RegisterController::class, 'index'])->name('register.index');

Route::post('/register', [RegisterController::class, 'register'])->name('register');

Route::get('/user', [UserController::class, 'index'])->name('user.index');

Route::patch('/user/update', [UserController::class, 'update'])->name('user.update');

Route::get('/user/logout', [UserController::class, 'logout'])->name('user.logout');

Route::post('/add-medicine', [MedicineController::class, 'store'])->name('add-medicine');

Route::get('/active-drugs', [MedicineController::class, 'getActiveDrugs']);

Route::middleware(['auth'])->group(function () {
    Route::post('/notifications/subscribe', [NotificationController::class, 'subscribeToNotifications'])
        ->name('notifications.subscribe');

    Route::post('/notifications/reminder/{medicine}', [NotificationController::class, 'sendReminder'])
        ->name('notifications.reminder');

    Route::get('/dashboard', [DrugController::class, 'index'])->name('dashboard');
    Route::get('/active-drugs', [DrugController::class, 'getActiveDrugs']);
    Route::post('/add-medicine', [DrugController::class, 'store'])->name('add-medicine');
    Route::get('/drug/{drug}', [DrugController::class, 'show']);
    Route::put('/drug/{drug}', [DrugController::class, 'update']);
    Route::delete('/drug/{drug}', [DrugController::class, 'destroy']);
    Route::post('/send-reminder', [DrugController::class, 'sendReminder']);
});
