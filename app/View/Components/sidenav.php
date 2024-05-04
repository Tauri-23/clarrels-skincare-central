<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class sidenav extends Component
{
    public $navType;
    public $activeLink;

    public function __construct($navType, $activeLink)
    {
        $this->navType=$navType;
        $this->activeLink=$activeLink;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.sidenav');
    }
}
