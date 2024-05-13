<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class AppointmentBookedNotification extends Notification
{
    use Queueable;
    protected $message;
    /**
     * Create a new notification instance.
     */
    public function __construct(Message $message)
    {
        $this->message = $message;
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
                    ->subject('New Appointment Booked')
                    ->line('A new appointment has been booked.')
                    ->line('Please check your schedule.');
    }

    public function toArray(object $notifiable): array
    {
        return [
            'message' => 'A new appointment has been booked.', // Customize the data stored in the database
            'type' => 'appointment_booked', // Optionally, you can add more data fields
        ];
    }
}
