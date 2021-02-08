<?php

namespace App\Providers;

use App\Services\NotificationInterface;
use App\Services\Sms;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(NotificationInterface::class, function () {

                    return new Sms();
    
            }
        );
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Validator::extend('strongPassword', function($attribute, $value) {
            return preg_match('^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z]).{8,}$^', $value);
        }, 'فیلد :attribute باید شامل حروف کوچک، بزرگ، اعداد و کاراکترهای ویزه باشد.');
    }
}
