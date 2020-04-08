<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Guru as dGuru;
use App\User;

class Guru extends Component
{
    public function render()
    {
        return view('livewire.guru', [
            'data' => dGuru::cursor()
        ]);
    }
}
