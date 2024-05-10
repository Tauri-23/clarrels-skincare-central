<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class doctor_render_patients extends Component
{
    public $patients;
    public function __construct($patients)
    {
        $this->patients = $patients;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.doctor_render_patients');
    }
}
