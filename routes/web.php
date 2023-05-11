<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CareerController;

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

// Admin Route
Route::prefix('admin')->middleware(['auth','isAdmin'])->group(function (){
Route::get('/dashboard',[App\Http\Controllers\Admin\DashboardController::class,'index']);
});


