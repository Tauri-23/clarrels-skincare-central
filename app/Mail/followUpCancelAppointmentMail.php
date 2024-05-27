<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class followUpCancelAppointmentMail extends Mailable
{
    use Queueable, SerializesModels;

    public $appointmentId, $service, $doctor, $reason;
    public function __construct($appointmentId, $service, $doctor, $reason)
    {
        $this->service = $service;
        $this->doctor = $doctor;
        $this->appointmentId = $appointmentId;
        $this->reason = $reason;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('cabantogdentalskincare@gmail.com', "Cabantog's Clininc")
        ->subject('Follow-up Appointment.')
        ->view('Email.followUpCancelAppointment')
        ->with([
            'service' => $this->service,
            'doctor' => $this->doctor,
            'appointmentId' => $this->appointmentId,
            'reason' => $this->reason
        ]);
    }
}
