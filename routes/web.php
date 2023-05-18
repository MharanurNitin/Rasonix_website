<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BlogsController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CareerController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;

// public Routes
Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);
Route::get('/contact', function () {
    return view('contact');
});
Route::post('/contact', [ContactController::class, 'store']);

// protected route for if user already login
Route::middleware('is_login')->group(function () {
    // Register Route
    Route::get('/register', [RegisterController::class, 'index']);
    Route::post('/register', [RegisterController::class, 'store'])->name('register');
    // Login Route
    Route::get('/login', [UserController::class, 'index'])->name('login');
    Route::post('/login', [UserController::class, 'login']);
});
Route::middleware(['guard'])->group(function () {
    Route::prefix('admin')->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
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
        Route::get('add-jobs', [CareerController::class, 'add_jobs'])->name('add_jobs');
        Route::post('add-jobs', [CareerController::class, 'store_jobs'])->name('add_jobs');
        Route::get('view-jobs', [CareerController::class, 'view_jobs'])->name('view_jobs');
        Route::get('edit-jobs/{id}', [CareerController::class, 'edit_jobs'])->name('edit_jobs');
        Route::put('update-jobs/{id}', [CareerController::class, 'update_jobs'])->name('update_jobs');
        Route::get('delete-jobs/{id}', [CareerController::class, 'destroy'])->name('delete_jobs');
        Route::get('add-portfolio', [PortfolioController::class, 'add_protfolio'])->name('add-portfolio');
        Route::get('view-portfolio', [PortfolioController::class, 'view_protfolio'])->name('view-portfolio');
        Route::get('add-portfolio', [PortfolioController::class, 'add_protfolio'])->name('add-portfolio');
        Route::post('add-portfolio', [PortfolioController::class, 'store'])->name('add-portfolio');
        Route::get('view-portfolio', [PortfolioController::class, 'view_protfolio'])->name('view-portfolio');
        Route::get('add-user', [UserController::class,'add_user'])->name('add_user');
        Route::post('add-user', [UserController::class,'store_user'])->name('add-user');
        Route::get('view-users', [UserController::class,'view_user'])->name('view-users');
        Route::get('edit-users/{id}', [UserController::class,'edit_user'])->name('edit-users');
        Route::put('update-user/{id}', [UserController::class,'update_user'])->name('update-user');
        Route::get('delete-user/{id}', [UserController::class,'destroy'])->name('delete-user');
        Route::get('edit-portfolio/{id}', [PortfolioController::class, 'edit_portfolio'])->name('edit-portfolio');
        Route::put('update-portfolio/{id}', [PortfolioController::class, 'update_portfolio'])->name('update-portfolio');
        Route::get('delete-portfolio/{id}', [PortfolioController::class, 'destroy'])->name('delete-portfolio');
        Route::get('all-contacts', [ContactController::class, 'getdata'])->name('all-contacts');
        Route::get('/contact/delete/{id}', [ContactController::class, 'destroy']);

        // Route For Change Password
       Route::get('change-password',[ProfileController::class,'view_profile'])->name('change-password');
       Route::post('update-password',[ProfileController::class,'update_password'])->name('update-password');
    });
});
Route::get('/logout', [LogoutController::class, 'logout'])->name('logout');
