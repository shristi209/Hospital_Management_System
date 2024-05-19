<?php
namespace App\Mail;

use App\Models\Patient;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AppointmentBookedMail extends Mailable
{
    use Queueable, SerializesModels;
    protected $patient;
    /**
     * Create a new message instance.
     */
    public function __construct(Patient $patient)
    {
        $this->patient=$patient;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Appointment Booked Mail')
                    ->view('emails.doctoremail')
                    ->with('patient', $this->patient);
    }
}
