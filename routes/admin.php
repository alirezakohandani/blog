<?php

Route::get('/post', [App\Http\Controllers\Admin\PostController::class, 'show'])->name('admin.show.form');
Route::post('/post', [App\Http\Controllers\Admin\PostController::class, 'store'])->name('admin.store.form');
Route::get('/Analytics', [App\Http\Controllers\Admin\AnalyticController::class, 'show'])->name('admin.Analytics');