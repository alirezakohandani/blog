<?php

Route::get('/post', [App\Http\Controllers\Admin\PostController::class, 'show'])->name('admin.show.form');
Route::post('/post', [App\Http\Controllers\Admin\PostController::class, 'store'])->name('admin.store.form');
Route::get('/Analytics', [App\Http\Controllers\Admin\AnalyticController::class, 'show'])->name('admin.Analytics');

Route::get('send/sms', [App\Http\Controllers\Admin\NotificationController::class, 'show'])->name('admin.notification.show.form.sms');
Route::post('send/sms', [App\Http\Controllers\Admin\NotificationController::class, 'sendSms'])->name('admin.notification.send.sms');