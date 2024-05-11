<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class patient_render_history_full extends Component
{
    public $history;
    public function __construct($history)
    {
        $this->history = $history;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.patient_render_history_full');
    }
}
