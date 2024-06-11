<?php

namespace App\Notifications;

use App\Models\Doctor;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class AvailabilityNotificationToDoctor extends Notification
{
    use Queueable;

    protected $doctor;
    public function __construct(Doctor $doctor)
    {
        $this->doctor=$doctor;

    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        // dd($notifiable);
        return ['database'];
    }


    public function toArray(object $notifiable): array
    {
        $unavailableDay = $this->doctor->schedule->where('status', 'unavailable')->first()->day ?? 'Unknown';

        return [
            'message' => 'Doctor ' . $this->doctor->first_name  . ' is unavailable on ' . $unavailableDay . '.',
            'type' => 'unavailability',
            'doctor_id' => $this->doctor->id,

        ];
    }
}
