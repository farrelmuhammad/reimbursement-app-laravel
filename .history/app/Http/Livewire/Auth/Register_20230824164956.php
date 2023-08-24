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
            'nip' => 'required|unique:employees',
            'nama' => 'required',
            'jabatan' => 'required',
            'password' => 'required|min:6|same:confirm_password',
        ]);

        // Start a transaction to ensure data consistency
        DB::beginTransaction();

        try {
            // Insert into employees table
            DB::table('employees')->insert([
                'nip' => $this->nip,
                'nama_karyawan' => $this->nama,
                'jabatan' => $this->jabatan,
            ]);

            // Insert into users table
            DB::table('users')->insert([
                'nip' => $this->nip,
                'name' => $this->nama,
                'email' => $this->nip . '@example.com', // Generate a dummy email using NIP
                'password' => Hash::make($this->password),
            ]);

            // Commit the transaction
            DB::commit();

            // Redirect to login page or any other page
            return redirect()->route('login');
        } catch (\Exception $e) {
            // Rollback the transaction in case of any errors
            DB::rollback();

            // Handle the exception as needed
            // For example, show an error message to the user
            session()->flash('error', 'An error occurred during registration.');

            // Redirect back to the registration page
            return redirect()->back();
        }
    }
}
