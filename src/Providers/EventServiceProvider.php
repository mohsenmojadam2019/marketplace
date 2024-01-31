<?php

namespace marketplace\src\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use marketplace\src\Observers\OrderObserver;
use marketplace\src\Models\Order;


class EventServiceProvider extends ServiceProvider
{
    protected $listen = [
        // ...
    ];

    public function boot()
    {
        parent::boot();

        Order::observe(OrderObserver::class);
    }
}
