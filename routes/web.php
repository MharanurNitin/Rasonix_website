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
Route::get('job/{id}/applicants', [CareerController::class, 'getApplicant']); //it gives all applicants of perticular job id
Route::get('/jobs', [CareerController::class, 'allJobs']); //gives all listed jobs
Route::get('/job/{id}', [CareerController::class, 'findJob']); //gives perticular job information
Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);

// Register Route
Route::get('/register', [RegisterController::class, 'index']);
Route::post('/register', [RegisterController::class, 'store'])->name('register');
// Login Route
Route::get('/login', [UserController::class, 'index'])->name('login');

// Route::prefix('/Admin')->middleware()->group(['isAdmin'], function () {
Route::post('/login', [UserController::class, 'login']);
Route::get('/admin/dashboard', [DashboardController::class, 'index']);
Route::get('/category', [App\Http\Controllers\Admin\CategoryController::class, 'index']);
Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');
Route::get('/admin/dashboard/create', [DashboardController::class, 'create'])->name('create');
Route::get('/admin/dashboard/view-category', [DashboardController::class, 'view'])->name('view-category');
Route::post('/admin/dashboard/view-category', [DashboardController::class, 'view'])->name('view-category');
// });
