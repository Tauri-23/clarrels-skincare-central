<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class top_nav_doctor extends Component
{
    public $doctor;
    public $title;

    public function __construct($doctor, $title)
    {
        $this->doctor = $doctor;
        $this->title = $title;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.top_nav_doctor');
    }
}
