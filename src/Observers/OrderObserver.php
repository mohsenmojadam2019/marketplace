<?php

namespace marketplace\src\Observers;

use marketplace\src\Models\Order;
use marketplace\src\Traits\NotificationTrait;

class OrderObserver
{
    use NotificationTrait;

    /**
     * Handle the Order "created" event.
     */

    public function created(Order $order)
    {
        $this->sendOrderConfirmationEmail($order->user, $order);
    }

}
