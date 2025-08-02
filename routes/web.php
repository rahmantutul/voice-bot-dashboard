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


Route::group(['middleware' => 'auth'], function () {
    Route::get('/user-dashboard', [HomeController::class, 'index'])->name('home');
    Route::get('/user-profile', [HomeController::class, 'profile'])->name('user.profile');
    Route::put('/user-profile/update', [HomeController::class, 'updateProfile'])->name('user.profile.update');
    Route::get('/user/subscription', [HomeController::class, 'subscription'])->name('user.subscription');
    Route::get('/user/bots', [HomeController::class, 'bots'])->name('user.bot.list');
    Route::get('/user/bot/create', [HomeController::class, 'bot_create'])->name('user.bot.create');
    Route::get('/user/bot/store', [HomeController::class, 'bot_store'])->name('user.bot.store');
    Route::get('/user/bot/overview', [HomeController::class, 'overview'])->name('user.bot.overview');
});
