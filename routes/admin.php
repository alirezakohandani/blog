<?php



Route::get('/post', [App\Http\Controllers\Admin\PostController::class, 'show'])->name('show.form');
Route::post('/post', [App\Http\Controllers\Admin\PostController::class, 'store'])->name('store.form');
Route::get('get', [App\Http\Controllers\Admin\Analytics::class, 'show'])->name('Analytics');