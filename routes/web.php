<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CareerController;
use App\Http\Controllers\RegisterController;

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
Route::get('/login', [LoginController::class, 'index']);
Route::post('login', [LoginController::class, 'login']);
// Admin Route
Route::prefix('admin')->middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index']);
});
