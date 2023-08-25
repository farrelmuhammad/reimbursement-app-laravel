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
            'nip_login' => 'required',
            'password' => 'required',
        ]);

        if (Auth::attempt(['nip' => $this->nip_login, 'password' => $this->password])) {
            // Authentication successful, redirect to desired page
            $this->emit('alert', [
                'type' => 'success',
                'title' => 'Success!',
                'message' => 'Login successful.'
            ]);
            return redirect()->to('/home');
        }

        throw ValidationException::withMessages([
            'nip_login' => ['NIP belum terdaftar. Silahkan lakukan registrasi terlebih dahulu.'],
        ]);
    }
}
