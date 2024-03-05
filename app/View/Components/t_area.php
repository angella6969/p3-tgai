<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class t_area extends Component
{
    /**
     * Create a new component instance.
     */
    public $nama, $judul, $nilai, $placeholder;
    public function __construct($nama, $judul, $nilai, $placeholder)
    {
        $this->nama = $nama;
        $this->judul = $judul;
        $this->nilai = $nilai;
        $this->placeholder = $placeholder;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.t_area');
    }
}
