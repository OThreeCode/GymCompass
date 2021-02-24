<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::view('/', 'index');
Route::view('/login', 'login.login');
Route::post('/login', [LoginController::class, 'authenticate'])->name('login');

Route::middleware(['auth'])->group(function () {
   Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
   
   Route::view('/home', 'home')->name('home');
   Route::view('/users/create', 'users.create')->name('users.create');

   Route::get('/users', [UserController::class, 'index'])->name('users.index');
   Route::get('/users/{user}', [UserController::class, 'show'])->name('users.show');   
   Route::get('/users/delete/{user}', [UserController::class, 'delete'])->name('users.delete'); // this is weird, fix it later
   Route::post('/users', [UserController::class, 'store'])->name('users.store');
   Route::patch('/users/{user}', [UserController::class, 'update'])->name('users.update');
   
   // Route::resource('users', UserController::class);
});
