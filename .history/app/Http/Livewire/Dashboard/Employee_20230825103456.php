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

    public $nip_employeee;
    public $employee_name;
    public $jabatan = 'staff';
    public $password;

    public function render()
    {
        $employees = DB::table('users')->paginate(5);
        // dd($employees);
        return view('livewire.dashboard.employee', compact('employees'));
    }

    public function submit()
    {
        $data = [
            'nip_employeee' => $this->nip_employeee,
            'employee_name' => $this->employee_name,
            'jabatan' => $this->jabatan,
            'password' => $this->password,
        ];
        dd($data);
        $this->validate([
            'nip_employeee' => 'required|unique:users,nip',
            'employee_name' => 'required|string',
            'jabatan' => 'required|in:Direktur,Finance,Staff',
            'password' => 'required|min:6',
        ]);

        // Hash the password
        $hashedPassword = Hash::make($this->password);

        // Create the user
        DB::table('users')->insert([
            'nip' => $this->nip_employeee,
            'nama' => $this->employee_name,
            'jabatan' => $this->jabatan,
            'password' => $hashedPassword,
        ]);

        // Clear form fields
        $this->nip_employeee = '';
        $this->employee_name = '';
        $this->jabatan = '';
        $this->password = '';

        // Emit an event to indicate successful registration
        $this->emit('alert', [
            'type' => 'success',
            'title' => 'Success!',
            'message' => 'User created successfully.'
        ]);

        // Redirect to login page
        return redirect()->route('employee');
    }
}
