<?php

namespace App\Providers;

use App\Models\Credit;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        app()->bind('credit_amount', function () {
            return Credit::where('user_id', auth()->user()->id)->first()->amount ?? 0;
        });
    }
}
