<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'index');
Route::view('/login', 'login.login');
Route::post('/login', [LoginController::class, 'authenticate'])->name('login');

Route::middleware(['auth'])->group(function () {
    Route::get('/home', [DashboardController::class, 'home'])->name('home');
    
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

    Route::resource('users', UserController::class);
    Route::get('users/info/{user}', [UserController::class, 'info'])->name('users.info');
});
