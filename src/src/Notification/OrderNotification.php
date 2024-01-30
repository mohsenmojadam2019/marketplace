<?php

namespace marketplace\src\Notification;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class OrderNotification
{
    use Queueable;

    public function __construct()
    {
        //
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('خرید شما ثبت شد')
            ->line('ممنون از خرید شما.')
            ->line('به امید دیدار مجدد.');
    }

    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
