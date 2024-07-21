<?php

namespace App\Providers;

use App\Pizzeria\Domain\Order\IOrderRepository;
use App\Pizzeria\Infrastructure\Order\OrderRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(IOrderRepository::class, OrderRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void {}
}
