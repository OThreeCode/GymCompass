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
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
   
    Route::view('/home', 'home')->name('home');
    Route::view('/users/create', 'users.create')->name('users.create');
    Route::view('/exercises/create', 'exercises.create')->name('exercises.create');
    // Route::view('/workouts/create', 'workouts.create')->name('workouts.create');

    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/users/{user}', [UserController::class, 'show'])->name('users.show');
    Route::get('/users/delete/{user}', [UserController::class, 'delete'])->name('users.delete'); // this is weird, fix it later
    Route::post('/users', [UserController::class, 'store'])->name('users.store');
    Route::patch('/users/{user}', [UserController::class, 'update'])->name('users.update');

    Route::get('/exercises', [ExerciseController::class, 'index'])->name('exercises.index');
    Route::get('/exercises/{exercise}', [ExerciseController::class, 'show'])->name('exercises.show');
    Route::get('/exercises/delete/{exercise}', [ExerciseController::class, 'delete'])->name('exercises.delete'); // this is weird, fix it later
    Route::post('/exercises', [ExerciseController::class, 'store'])->name('exercises.store');
    Route::patch('/exercises/{exercise}', [ExerciseController::class, 'update'])->name('exercises.update');

    Route::get('workouts', [WorkoutController::class, 'index'])->name('workouts.index');
    Route::get('workouts/{workout}', [WorkoutController::class, 'show'])->name('workouts.show');
    Route::get('workout/create', [WorkoutController::class, 'create'])->name('workouts.create');
    Route::get('workouts/delete/{workout}', [WorkoutController::class, 'delete'])->name('workouts.delete');
    Route::post('/workouts', [WorkoutController::class, 'store'])->name('workouts.store');
    Route::patch('workouts/{workout}', [WorkoutController::class, 'update'])->name('workouts.update');

    // Route::resource('workouts', [WorkoutController::class]);
   
    // Route::resource('users', UserController::class);
});
