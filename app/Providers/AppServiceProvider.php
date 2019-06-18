<?php

namespace App\Providers;

use App\Order;
use App\OrderDetail;
use App\Observers\OrderObserver;
use App\Observers\OrderDetailObserver;
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
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Order::observe(OrderObserver::class);
        OrderDetail::observe(OrderDetailObserver::class);
    }
}
