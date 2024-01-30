<?php

namespace Shab\Marketplace\Observers;

use Shab\Marketplace\Models\Order;
use Shab\Marketplace\Traits\NotificationTrait;

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
