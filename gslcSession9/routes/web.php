<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SocialiteController;
use App\Http\Controllers\RegisterController;

Route::middleware('guest')->group(function () {
    Route::get('/', [HomeController::class, 'view'])->name('home');
    Route::get('/login', [LoginController::class, 'view'])->name('login');
    Route::get('/register', [RegisterController::class, 'view'])->name('register');
    Route::get('/forgot-password', function(){
        return view('authentication.forgotPassword');
    })->name('forgotPassword');
    Route::get('/verification', function(){
        return view('authentication.verification');
    })->name('verification');
    Route::get('auth/{provider}', [SocialiteController::class, 'redirect'])->where('provider', 'github|google')->name('redirect');
    Route::get('auth/{provider}/callback', [SocialiteController::class, 'callback'])->where('provider', 'github|google')->name('callback');
});

Route::post('/login', [LoginController::class, 'login']);
Route::post('/register', [RegisterController::class , 'store']);

// Route::middleware('auth')->group(function () {
//     Route::get('/', [HomeController::class, 'view'])->name('home');
//     Route::get('/login', [LoginController::class, 'view'])->name('login');
//     Route::get('/register', [RegisterController::class, 'view'])->name('register');
//     Route::get('/forgot-password', function(){
//         return view('authentication.forgotPassword');
//     })->name('forgotPassword');

//     Route::get('/verification', function(){
//         return view('authentication.verification');
//     })->name('verification');
//     Route::get('auth/{provider}', [SocialiteController::class, 'redirect'])->where('provider', 'github|google')->name('redirect');
//     Route::get('auth/{provider}/callback', [SocialiteController::class, 'callback'])->where('provider', 'github|google')->name('callback');
// });