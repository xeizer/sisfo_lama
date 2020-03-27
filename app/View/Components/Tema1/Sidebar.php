<?php

namespace App\View\Components\Tema1;

use Illuminate\View\Component;


class Sidebar extends Component
{
    public $judul;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($judul)
    {
        $this->judul = $judul;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.tema1.sidebar');
    }
}
