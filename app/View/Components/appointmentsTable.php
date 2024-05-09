<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class appointmentsTable extends Component
{
    public $appointments;
    public $type;
    public function __construct($appointments, $type)
    {
        $this->appointments = $appointments;
        $this->type = $type;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.appointments-table');
    }
}
