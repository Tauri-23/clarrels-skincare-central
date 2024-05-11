<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class doctor_render_appointments_2 extends Component
{
    public $appointments;
    public function __construct($appointments)
    {
        $this->appointments = $appointments;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.doctor_render_appointments_2');
    }
}
