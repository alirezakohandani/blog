<?php

use App\Http\Controllers\BlogController;
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

Route::get('/', function () {
    return view('admin.admin');
});

Route::group(['prefix' => 'post'], function() {
    
    Route::get('/', [PostController::class, 'show'])->name('post.show');
    Route::get('details/{id}', [PostController::class, 'showDetails'])->name('post.show.details');
});