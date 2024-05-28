<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class admin_render_patients extends Component
{
    public $patients;
    public function __construct($patients, $count)
    {
        $this->patients = $patients;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.admin_render_patients');
    }
}
