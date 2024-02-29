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
    public  $icon_class, $name_input, $value1;
    public function __construct( $icon_class, $name_input, $value1)
    {
        
        $this->icon_class = $icon_class;
        $this->name_input  = $name_input;
        $this->value1  = $value1;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.input');
    }
}
