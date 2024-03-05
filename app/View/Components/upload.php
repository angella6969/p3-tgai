<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class upload extends Component
{
    /**
     * Create a new component instance.
     */
    public $nama, $judul, $nilai, $detail;
    public function __construct($nama, $judul, $nilai, $detail)
    {
        $this->nama = $nama;
        $this->judul = $judul;
        $this->nilai = $nilai;
        $this->detail = $detail;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.upload');
    }
}
