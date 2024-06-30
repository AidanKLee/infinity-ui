<?php

namespace App\Livewire\Pages;

use Livewire\Component;

class Home extends Component
{
    public array $login = [
        'email' => '',
        'password' => '',
    ];

    public array $register = [
        'name' => '',
        'email' => '',
        'password' => '',
        'password_confirmation' => '',
    ];

    protected function rules() {
        return [
            'login.email' => 'required|email',
            'login.password' => 'required|min:8',
            'register.name' => 'required|string|regex:/^[\pL\s\-]+$/u|min:2',
            'register.email' => 'required|email',
            'register.password' => [
                'required',
                'min:8',
                'confirmed',
                Password::min(8)
                    ->letters()
                    ->mixedCase()
                    ->numbers()
                    ->symbols()
                    ->uncompromised(),
            ],
        ];
    } 

    protected $messages = [
        'register.name.regex' => 'Please enter your full name using only letters, spaces and hyphens.',
    ];

    protected array $validationAttributes = [
        'login.email' => 'email',
        'login.password' => 'password',
        'register.name' => 'name',
        'register.email' => 'email',
        'register.password' => 'password',
        'register.password_confirmation' => 'password confirmation',
    ];

    public function updated($propertyName)
    {
        // dump($this->login, $this->register);
    }

    public function login()
    {
        dd('Login');
        // $this->validateOnly(['login.email', 'login.password']);
    }

    public function register()
    {
        // $this->validateOnly(['register.name', 'register.email', 'register.password', 'register.password_confirmation']);
    }

    public function render()
    {
        return view('livewire.pages.home');
    }
}
