<?php

namespace marketplace\src\Observers;

use marketplace\src\Models\Order;
use marketplace\src\Notification\OrderNotification;

class OrderObserver
{
    /**
     * Handle the Order "created" event.
     */

    public function created(Order $order)
    {
        $order->user->notify(new OrderNotification());
    }

}
