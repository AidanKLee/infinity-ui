<?php

namespace App\Livewire\Components\Buttons;

use Livewire\Attributes\On;
use Livewire\Component;

class Auth extends Component
{
    public bool|null $fullWidth;
    public string $class;
    
    public function handleLogout()
    {
        auth()->logout();

        $this->dispatch('auth-changed');
    }

    #[On('auth-changed')]
    public function render()
    {
        return view('livewire.components.buttons.auth');
    }
}
