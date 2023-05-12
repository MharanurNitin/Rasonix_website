<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CareerController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\Admin\DashboardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// public Routes
Route::get('/applicants/{id}', [CareerController::class, 'index'])->name('applicants');
Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);

// Register Route
Route::get('/register', [RegisterController::class, 'index']);
Route::post('register', [RegisterController::class, 'store'])->name('register');
// Login Route
Route::get('/login', [UserController::class, 'index'])->name('login');

Route::post('login', [UserController::class, 'login']);
Route::get('admin/dashboard', [DashboardController::class, 'index']);
Route::get('category', [App\Http\Controllers\Admin\CategoryController::class, 'index']);
Route::post('logout', [LogoutController::class, 'logout'])->name('logout');


