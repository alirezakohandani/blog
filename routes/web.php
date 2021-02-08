<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\PlanController;
use App\Http\Controllers\PostController;
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


Route::group(['prefix' => 'posts'], function() {
    Route::get('/', [PostController::class, 'show'])->name('post.show');
    Route::get('details/{slug}', [PostController::class, 'showDetails'])->name('post.show.details');
    Route::post('details/{slug}/comments', [CommentController::class, 'store'])->name('post.comment.store');
});

Route::group(['prefix' => 'auth'], function() {

    Route::get('register', [RegisterController::class, 'showRegisterForm'])->name('auth.register.form');
    Route::post('register', [RegisterController::class, 'register'])->name('auth.register');
    
    Route::get('login', [LoginController::class, 'showLoginForm'])->name('auth.login.form');
    Route::post('login', [LoginController::class, 'login'])->name('auth.login');

    Route::get('logout', [LoginController::class, 'logout'])->name('auth.logout');
});

Route::group(['prefix' => 'plans', 'as' => 'plan.'], function() {
    Route::get('/', [PlanController::class, 'show'])->name('show');
});

