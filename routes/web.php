<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use App\Models\User;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware(['auth'])->group(function () {
   Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
   
   Route::view('/home', [UserController::class, 'index'])->name('home');
   Route::get('users/{user}', [UserController::class, 'delete'])->name('users.delete');
   Route::get('users', [UserController::class, 'index'])->name('users.index');
   Route::get('users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
   Route::post('users', [UserController::class, 'store'])->name('users.store');
   Route::patch('user/{id}', [UserController::class, 'update'])->name('users.update');
   // Route::resource('users', UserController::class);
});

Route::view('/', 'index');

Route::view('/login', 'login.login');
Route::post('/login', [LoginController::class, 'authenticate'])->name('login');
