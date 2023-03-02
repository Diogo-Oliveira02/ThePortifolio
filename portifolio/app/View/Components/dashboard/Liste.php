<?php

namespace App\View\Components\dashboard;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Liste extends Component
{
    /**
     * Create a new component instance.
     */
    public $result;
    public $service;

    public function __construct($result, $service)
    {
        $this->result = $result;
        $this->service = $service;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.dashboard.liste');
    }
}
