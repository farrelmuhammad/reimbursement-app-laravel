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

    public function register()
    {
        $this->validate([
            'nip' => 'required|unique:users,nip',
            'nama' => 'required|string',
            'jabatan' => 'required|in:Direktur,Finance,Staff',
            'password' => 'required|min:8',
        ]);

        // Hash the password
        $hashedPassword = Hash::make($this->password);

        // Create the user
        DB::table('users')->insert([
            'nip' => $this->nip,
            'nama' => $this->nama,
            'jabatan' => $this->jabatan,
            'password' => $hashedPassword,
        ]);

        // Clear form fields
        $this->nip = '';
        $this->nama = '';
        $this->jabatan = '';
        $this->password = '';
        $this->confirm_password = '';

        // Emit an event to indicate successful registration
        $this->emit('registrationSuccess');
    }


    public function render()
    {
        return view('livewire.auth.register');
    }
}
