<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class side_nav_doctor extends Component
{
    public $activeLink;
    public $doctor;
    public function __construct($activeLink, $doctor)
    {
        $this->activeLink = $activeLink;
        $this->doctor = $doctor;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.side_nav_doctor');
    }
}
