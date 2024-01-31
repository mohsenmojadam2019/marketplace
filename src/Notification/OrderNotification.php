<?php
namespace marketplace\src\Notification;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;
use marketplace\src\Models\Order;

class OrderNotification extends Notification
{
    use Queueable;

    protected $order;

    public function __construct(Order $order)
    {
        $this->order = $order;
    }

    public function via()
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Your order has been placed!')
            ->line('Thank you for your order!')
            ->line('Order ID: ' . $this->order->id)
            ->line('Order Total: ' . $this->order->total)
            ->line('Order Details: ' . $this->order->details);
    }

    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}

