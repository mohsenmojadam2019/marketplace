<?php

namespace marketplace\src\Observers;

use Illuminate\Support\Facades\Log;
use marketplace\src\Models\Order;
use marketplace\src\Notification\OrderNotification;

class OrderObserver
{
    /**
     * Handle the Order "created" event.
     */

    public function created(Order $order)
    {
      //  info(json_encode($order));
        $order->user->notify(new OrderNotification($order));
    }


}
