<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class input extends Component
{
    /**
     * Create a new component instance.
     */
    public  $label, $icon, $value1, $nama;
    public function __construct($label, $icon, $nama, $value1)
    {

        $this->label = $label;
        $this->icon  = $icon;
        $this->value1  = $value1;
        $this->nama  = $nama;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.input');
    }
}
