<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\DashboardController;

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

Route::get('/', function () {
    return view('pages.home');
})->middleware('guest');

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate'])->middleware('guest');

Route::get('/logout', function() {
    return redirect('/');
})->middleware('auth');
Route::post('/logout', [LoginController::class, 'logout'])->middleware('auth');

Route::get('/register', function() {
    return redirect('/');
});
Route::post('/register', [RegisterController::class, 'store'])->middleware('guest');

Route::get('/change-password', function() {
    return view('pages.change_password');
})->middleware('auth');
Route::post('/change-password', [ChangePasswordController::class, 'changePassword'])->middleware('auth');

Route::get('/message', function() {
    return redirect('/');
});
Route::get('/message/@{username}', [MessageController::class, 'index']);
Route::post('/message', [MessageController::class, 'store']);

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');
Route::get('/dashboard/{id}', function() {
    return redirect('/dashboard');
})->middleware('auth');
Route::delete('/dashboard/{id}', [DashboardController::class, 'destroy'])->middleware('auth');
