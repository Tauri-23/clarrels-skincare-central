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

    public $alertType, $service, $date , $doctor;
    public function __construct($alertType, $service, $date, $doctor)
    {
        $this->alertType = $alertType;
        $this->service = $service;
        $this->date = $date;
        $this->doctor = $doctor;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('cabantogsclinic@gmail.com', "Cabantog's Clininc")
        ->subject('Appointment Alert.')
        ->view('Email.appointment')
        ->with([
            'alertType' => $this->alertType,
            'service' => $this->service,
            'date' => $this->date,
            'doctor' => $this->doctor,
        ]);
    }
}
