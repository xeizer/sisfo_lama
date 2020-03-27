<?php

namespace App\View\Components\tema1;

use Illuminate\View\Component;

class Pageheader extends Component
{
    public $judul;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($judul, $subjudul)
    {
        $this->judul = $judul;
        $this->subjudul = $subjudul;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.tema1.pageheader');
    }
}
