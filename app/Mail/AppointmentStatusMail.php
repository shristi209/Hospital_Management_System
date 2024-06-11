<?php

namespace App\Mail;

use App\Models\Patient;
use App\Models\Schedule;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AppointmentStatusMail extends Mailable
{
    use Queueable, SerializesModels;

    protected $schedule, $patient;
    public function __construct(Schedule $schedule, Patient $patient)
    {
        $this->schedule = $schedule;
        $this->patient = $patient;
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function build()
    {
        return $this->subject('Appointment With CareSync')
            ->view('emails.patientemail')
            ->with('schedule', $this->schedule)
            ->with('patient', $this->patient);
    }
}
