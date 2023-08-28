<?php

namespace App\Http\Livewire\Dashboard;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Employee extends Component
{
    protected $listeners = [
        'updateEmployee' => 'updateEmployee'
    ];

    public $nip_employee;
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
        $this->validate([
            'nip_employee' => 'required',
            'employee_name' => 'required',
            'jabatan' => 'required',
            'password' => 'required|min:6',
        ]);

        // Hash the password
        $hashedPassword = Hash::make($this->password);

        // Create the user
        \App\Models\User::create([
            'nip' => $this->nip_employee,
            'nama' => $this->employee_name, // Provide the 'nama' value from the form input
            'jabatan' => $this->jabatan,
            'password' => $hashedPassword,
        ]);

        // Clear form fields
        $this->nip_employee = '';
        $this->employee_name = ''; // Reset the 'nama' field
        $this->jabatan = '';
        $this->password = '';

        // Emit an event to indicate successful registration
        $this->emit('alert', [
            'type' => 'success',
            'title' => 'Success!',
            'message' => 'User created successfully.'
        ]);
    }

    public function updateEmployee($id)
    {
        dd($id);
        // Find the user by ID
        $user = \App\Models\User::find($id);

        // If the user is found
        if ($user) {
            // Validate the input
            $this->validate([
                'employee_name' => 'required',
                'jabatan' => 'required',
                'password' => 'nullable|min:6',
            ]);

            // Update user's information
            $user->nama = $this->employee_name;
            $user->jabatan = $this->jabatan;

            if ($this->password) {
                $hashedPassword = Hash::make($this->password);
                $user->password = $hashedPassword;
            }

            $user->save();

            // Clear form fields
            $this->employee_name = '';
            $this->jabatan = '';
            $this->password = '';

            // Emit an event to indicate successful update
            $this->emit('alert', [
                'type' => 'success',
                'title' => 'Success!',
                'message' => 'User updated successfully.'
            ]);
        }
    }
}
