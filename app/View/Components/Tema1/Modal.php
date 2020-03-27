<?php

namespace App\View\Components\Tema1;

use Illuminate\View\Component;

class Modal extends Component
{
    public $button, $header;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($header)
    {
        //

        $this->header = $header;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.tema1.modal');
    }
}
