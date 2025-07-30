<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\User\AuthController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('login'); 
});

Route::get('auth/google', [AuthController::class, 'redirectToGoogle'])->name('login.google');
Route::get('auth/google/callback', [AuthController::class, 'handleGoogleCallback']);

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
