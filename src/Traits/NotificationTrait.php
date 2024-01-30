<?php

namespace Shab\Marketplace\Traits;

trait NotificationTrait
{
    public function sendOrderConfirmationEmail($user, $order)
    {
        try {
            if (!($user instanceof \App\Models\User) || !($order instanceof \App\Models\Order)) {
                throw new \InvalidArgumentException("Invalid user or order provided.");
            }

            Mail::to($user->email)->send(new OrderConfirmation($order));

        } catch (\Exception $e) {
            \Log::error('Error sending order confirmation email: ' . $e->getMessage());
        }
    }
}
