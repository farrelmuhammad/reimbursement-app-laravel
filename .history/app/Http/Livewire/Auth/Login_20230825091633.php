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

    public $nip;
    public $password;

    public function render()
    {
        return view('livewire.auth.login');
    }

    public function login()
    {
        $data = [
            'nip' => $this->nip,
            'password' => $this->password,
        ];

        dd($data);
        $this->validate([
            'nip' => 'required|unique:users,nip',
            'password' => 'required',
        ]);

        if (Auth::attempt(['email' => $this->nip, 'password' => $this->password])) {
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
