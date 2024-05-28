<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class admin_render_doctors extends Component
{
    public $doctors;
    public function __construct($doctors)
    {
        $this->doctors = $doctors;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.admin_render_doctors');
    }
}
