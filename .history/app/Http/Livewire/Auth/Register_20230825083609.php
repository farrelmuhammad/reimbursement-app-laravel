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
}
