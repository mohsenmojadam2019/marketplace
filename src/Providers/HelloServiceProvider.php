<?php
namespace marketplace\src\Providers;

use Illuminate\Support\ServiceProvider;
use marketplace\src\Repositories\HelloRepository;
use marketplace\src\Repositories\Interfaces\HelloRepositoryInterface;

class HelloServiceProvider extends ServiceProvider
{
    public array $singletons = [
        HelloRepositoryInterface::class => HelloRepository::class
    ];
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__.'/../Routes/v1/api.php');
        $this->loadTranslationsFrom(__DIR__ . '/../Resources/lang', 'helloworld');
        $this->loadMigrationsFrom(__DIR__.'/../Database/Migrations');

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