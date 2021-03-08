<?php

use App\Http\Controllers\ExerciseController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WorkoutController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'index');
Route::view('/login', 'login.login');
Route::post('/login', [LoginController::class, 'authenticate'])->name('login');

Route::middleware(['auth'])->group(function () {
    Route::view('/home', 'home')->name('home');
    
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

    Route::resource('users', UserController::class);

    Route::resource('exercises', ExerciseController::class);

    Route::resource('workouts', WorkoutController::class);
});
