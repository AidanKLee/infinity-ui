<?php

namespace App\Livewire\Components\Forms;

use App\Actions\Fortify\CreateNewUser;
use App\Models\User;
use App\Notifications\ForgotPassword;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Password as PasswordReset;
use Livewire\Component;

class Auth extends Component
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

    public array $password = [
        'email' => '',
    ];

    protected function rules($type = '') {
        if ($type === 'login') {
            return [
                'login.email' => 'required|email|max:255',
                'login.password' => 'required|min:8|max:255',
            ];
        } elseif ($type === 'register') {
            return [
                'register.name' => 'required|string|regex:/^[\pL\s\-]+$/u|min:2|max:255',
                'register.email' => 'required|email|max:255|unique:users,email',
                'register.password' => [
                    'required',
                    'min:8',
                    'max:255',
                    'confirmed',
                    Password::min(8)
                        ->letters()
                        ->mixedCase()
                        ->numbers()
                        ->symbols()
                        ->uncompromised(),
                ],
            ];
        } elseif ($type === 'forgot-password') {
            return [
                'password.email' => 'required|email|max:255',
            ];
        } else {
            return [
                'password.email' => 'required|email|max:255',
                'login.email' => 'required|email|max:255',
                'login.password' => 'required|min:8|max:255',
                'register.name' => 'required|string|regex:/^[\pL\s\-]+$/u|min:2|max:255',
                'register.email' => 'required|email|max:255',
                'register.password' => [
                    'required',
                    'min:8',
                    'confirmed',
                    'max:255',
                    Password::min(8)
                        ->letters()
                        ->mixedCase()
                        ->numbers()
                        ->symbols()
                        ->uncompromised(),
                ],
            ];
        }
    } 

    protected $messages = [
        'register.name.regex' => 'Please enter your name using only letters, spaces and hyphens.'
    ];

    protected array $validationAttributes = [
        'password.email' => 'email',
        'login.email' => 'email',
        'login.password' => 'password',
        'register.name' => 'name',
        'register.email' => 'email',
        'register.password' => 'password',
        'register.password_confirmation' => 'password confirmation',
    ];
    
    public function dismissErrors($error = null)
    {
        if ($error) {
            $this->resetErrorBag($error);
        } else {
            $this->resetErrorBag();
        }
    }

    public function handleResetPassword()
    {
        $this->validate($this->rules('forgot-password'));

        $user = User::where('email', $this->password['email'])->first();

        if (empty($user)) {
            $this->addError('password.email', 'We can\'t find a user with that email address.');
            return;
        }
        
        $token = PasswordReset::createToken($user);

        $user->notify(new ForgotPassword($token, $this->password['email']));

        $this->reset();
    }

    public function handleLogin()
    {
        $this->validate($this->rules('login'));

        if (!auth()->attempt($this->login)) {
            $user = User::where('email', $this->login['email'])->first();

            if (empty($user)) {
                $this->addError('login.email', 'These credentials do not match our records.');
            } else {
                $this->addError('login.password', 'You entered an incorrect password.');
            }

            return;
        }

        $this->dispatch('auth-changed');

        $this->reset();
    }

    public function handleRegister()
    {
        $this->validate($this->rules('register'));

        $user = (new CreateNewUser())->create([
            'name' => $this->register['name'],
            'email' => $this->register['email'],
            'password' => $this->register['password'],
        ]);

        auth()->login($user);

        $this->dispatch('auth-changed');

        $this->reset();
    }

    public function render()
    {
        return view('livewire.components.forms.auth');
    }
}
