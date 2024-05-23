<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class AvailabilityNotificationToDoctor extends Notification
{
    use Queueable;
    /**
     * Create a new notification instance.
     */
    public function __construct()
    {

    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        // dd($notifiable);
        return ['mail','database'];
    }


    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
                    ->subject('New Unavailable Message')
                    ->line('doctor will be unavailable.')
                    ->line('Please check schedule.');
    }

    public function toArray(object $notifiable): array
    {
        return [
            'message' => 'New Unavailable Message.',
            'type' => 'availability',
        ];
    }
}
