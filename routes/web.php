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

    // Users
    Route::resource('users', UserController::class);
    Route::get('/users/delete/{user}', [UserController::class, 'delete'])->name('users.delete'); // this is weird, fix it later

    // Exercises
    Route::resource('exercises', ExerciseController::class);
    Route::get('/exercises/delete/{exercise}', [ExerciseController::class, 'delete'])->name('exercises.delete'); // this is weird, fix it later

    // Workouts
    Route::resource('workouts', WorkoutController::class);
    Route::get('workouts/delete/{workout}', [WorkoutController::class, 'delete'])->name('workouts.delete'); // this is weird, fix it later
});
