<?php

namespace App\Livewire\Pages;

use Livewire\Component;

class Home extends Component
{
    public $categories = [1];

    public function updated($propertyName)
    {
        dump('Categories: ' . $this->categories);
    }

    public function render()
    {
        return view('livewire.pages.home');
    }
}
