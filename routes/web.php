<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
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
   Route::view('/home', 'home')->name('home');

   Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
   
   Route::resource('users', UserController::class);
});

Route::view('/', 'login.login');

Route::post('/login', [LoginController::class, 'authenticate'])->name('login');
