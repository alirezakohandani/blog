<?php

Route::group(['as' => 'admin.', 'middleware' => 'auth'], function() {
    Route::get('/post', [App\Http\Controllers\Admin\PostController::class, 'show'])->name('show.form');
    Route::post('/post', [App\Http\Controllers\Admin\PostController::class, 'store'])->name('store.form');
    Route::get('/Analytics', [App\Http\Controllers\Admin\AnalyticController::class, 'show'])->name('Analytics');
    
    Route::get('send/sms', [App\Http\Controllers\Admin\NotificationsController::class, 'show'])->name('notification.show.form.sms');
    Route::post('send/sms', [App\Http\Controllers\Admin\NotificationsController::class, 'sendSms'])->name('notification.send.sms');
});
