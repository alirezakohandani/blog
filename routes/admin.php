<?php



Route::get('/post', [App\Http\Controllers\Admin\PostController::class, 'show'])->name('show.form');
Route::post('/post', [App\Http\Controllers\Admin\PostController::class, 'store'])->name('store.form');
Route::get('/Analytics', [App\Http\Controllers\Admin\AnalyticsController::class, 'show'])->name('Analytics');