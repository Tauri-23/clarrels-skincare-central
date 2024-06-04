<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class appointmentMail extends Mailable
{
    use Queueable, SerializesModels;

    public $appointmentId, $alertType, $service, $date , $doctor, $reason;
    public function __construct($appointmentId, $alertType, $service, $date, $doctor, $reason)
    {
        $this->alertType = $alertType;
        $this->service = $service;
        $this->date = $date;
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
        ->subject('Appointment Alert.')
        ->view('Email.appointment')
        ->with([
            'alertType' => $this->alertType,
            'service' => $this->service,
            'date' => $this->date,
            'doctor' => $this->doctor,
            'appointmentId' => $this->appointmentId,
            'reason' => $this->reason
        ]);
    }
}
