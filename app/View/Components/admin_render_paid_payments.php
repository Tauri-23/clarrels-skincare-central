<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class admin_render_paid_appointments extends Component
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
        return view('components.admin_render_paid_payments');
    }
}
