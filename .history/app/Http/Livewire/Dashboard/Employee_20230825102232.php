<?php

namespace App\Http\Livewire\Dashboard;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Employee extends Component
{
    protected $listeners = [
        'submit' => 'submit'
    ];

    public $nip;
    public $nama;
    public $jabatan;
    public $password;

    public function render()
    {
        $employees = DB::table('users')->paginate(5);
        // dd($employees);
        return view('livewire.dashboard.employee', compact('employees'));
    }

    public function submit()
    {
        $this->validate([
            'nip_employeee' => 'required|unique:users,nip',
            'nama' => 'required|string',
            'jabatan' => 'required|in:Direktur,Finance,Staff',
            'password' => 'required|min:6',
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

        // Emit an event to indicate successful registration
        $this->emit('alert', [
            'type' => 'success',
            'title' => 'Success!',
            'message' => 'User created successfully.'
        ]);

        // Redirect to login page
        return redirect()->route('login');
    }
}
