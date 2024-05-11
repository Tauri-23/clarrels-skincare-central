<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class patient_top_nav extends Component
{
    public $patient;
    public $title;

    public function __construct($patient, $title)
    {
        $this->patient = $patient;
        $this->title = $title;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.patient_top_nav');
    }
}
