<?php

namespace App\Http\Livewire\Auth;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Register extends Component
{

    protected $listeners = [
        'register' => 'register'
    ];
    public $nip;
    public $nama;
    public $jabatan;
    public $password;
    public $confirm_password;

    public function render()
    {
        return view('livewire.auth.register');
    }

    public function register()
    {
        $this->validate([
            'nip' => 'required|unique:employees,nip',
            'nama' => 'required',
            'password' => 'required|min:6',
        ]);

        // Panggil fungsi register pada AuthController
        app(\App\Http\Controllers\AuthController::class)->register([
            'nip' => $this->nip,
            'nama' => $this->nama,
            'jabatan' => $this->jabatan,
            'password' => $this->password,
        ]);

        return redirect()->route('login');

        // Redirect to login or perform other actions
    }
}
