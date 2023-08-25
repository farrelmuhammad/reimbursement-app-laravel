<?php

namespace App\Http\Livewire\Auth;

use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Livewire\Component;

class Login extends Component
{
    protected $listeners = [
        'login' => 'login'
    ];

    public $nip_login;
    public $password;

    public function render()
    {
        return view('livewire.auth.login');
    }

    public function login()
    {
        $this->validate([
            'nip' => 'required',
            'password' => 'required',
        ]);

        if (Auth::attempt(['nip' => $this->nip_login, 'password' => $this->password])) {
            // Authentication successful, redirect to desired page
            $this->emit('alert', [
                'type' => 'success',
                'title' => 'Success!',
                'message' => 'Login successful.'
            ]);
            return redirect()->to('/dashboard');
        }

        throw ValidationException::withMessages([
            'email' => ['The provided credentials are incorrect.'],
        ]);
    }
}
