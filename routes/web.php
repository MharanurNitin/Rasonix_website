<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CareerController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\BlogsController;

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
        // Route::get('/category', [App\Http\Controllers\Admin\CategoryController::class, 'index']);
        Route::get('/users', [UserController::class, 'allUsers']);
        Route::get('create-category', [CategoryController::class, 'create'])->name('create-category');
        Route::post('create-category', [CategoryController::class, 'store']);
        Route::get('view-category', [CategoryController::class, 'view_category'])->name('view-category');
        Route::get('add-blog', [BlogsController::class, 'index']);
        Route::post('add-blog', [BlogsController::class, 'store']);
        Route::get('view-blog', [BlogsController::class, 'viewBlog']);
        Route::get('blog/delete/{id}', [BlogsController::class, 'destroy']);
        Route::get('blog/edit/{id}', [BlogsController::class, 'edit']);
        Route::put('blog/edit/{id}', [BlogsController::class, 'editsubmit'])->name('blogeditsubmit');
    });
});
Route::get('/logout', [LogoutController::class, 'logout'])->name('logout');
