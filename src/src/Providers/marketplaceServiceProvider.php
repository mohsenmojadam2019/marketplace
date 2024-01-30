<?php

namespace marketplace\src\Providers;

use Illuminate\Support\ServiceProvider;
use marketplace\src\Repositories\CategoryRepository;
use marketplace\src\Repositories\ProductRepository;
use marketplace\src\Repositories\OrderRepository;
use marketplace\src\Contracts\CategoryInterface;
use marketplace\src\Contracts\ProductInterface;
use marketplace\src\Contracts\OrderInterface;
use marketplace\src\Models\Order;
use marketplace\src\Observers\OrderObserver;

class marketplaceServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__ . '/../Routes/v1/api.php');
        $this->loadMigrationsFrom(__DIR__ . '/../Database/Migrations');
        $this->loadFactoriesFrom(__DIR__ . '/../Database/Factories');
        $this->loadViewsFrom(__DIR__ . '/../resources/views/emails');
        $this->publishes([
            __DIR__ . '/../Database/Migrations' => database_path('migrations'),
        ], 'marketplace-migrations');


        Order::observe(OrderObserver::class);
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register(): void
    {
    }
}
