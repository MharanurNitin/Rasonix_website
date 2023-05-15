<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CareerController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\ContactController;

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

Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);

// Register Route
Route::middleware('is_login')->group(function () {

    Route::get('/register', [RegisterController::class, 'index']);
    Route::post('/register', [RegisterController::class, 'store'])->name('register');
    // Login Route
    Route::get('/login', [UserController::class, 'index'])->name('login');
    Route::post('/login', [UserController::class, 'login']);
});
Route::middleware(['guard'])->group(function () {
    Route::prefix('admin')->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index']);

        Route::get('job/{id}/applicants', [CareerController::class, 'getApplicant']); //it gives all applicants of perticular job id
        Route::get('/jobs', [CareerController::class, 'allJobs']); //gives all listed jobs
        Route::get('/job/{id}', [CareerController::class, 'findJob'])->where('id', '[0-9]+');; //gives perticular job information
        Route::get('/category', [App\Http\Controllers\Admin\CategoryController::class, 'index']);
        Route::get('/users', [UserController::class, 'allUsers']);
    });
});
Route::get('/logout', [LogoutController::class, 'logout'])->name('logout');
// });
