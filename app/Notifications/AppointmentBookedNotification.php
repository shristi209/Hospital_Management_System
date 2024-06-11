<?php

namespace App\Notifications;

use App\Models\Patient;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class AppointmentBookedNotification extends Notification
{
    use Queueable;

    public $patient;
    public function __construct(Patient $patient)
    {
        $this->patient=$patient;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['database'];
    }


    public function toArray(object $notifiable): array
    {
        return [
            'message' => 'A new appointment has been booked by ' . $this->patient->full_name . '.',
            'type' => 'appointment_booked',
            'patient_id' => $this->patient->id,
            'patient_name' => $this->patient->full_name,
        ];
    }
}
