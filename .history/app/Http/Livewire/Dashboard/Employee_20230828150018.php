<?php

namespace App\Http\Livewire\Dashboard;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Employee extends Component
{
    protected $listeners = [
        'updateEmployee' => 'updateEmployee',
        'getDetailById' => 'getDetailById'
    ];

    public $nip_employee;
    public $employee_name;
    public $jabatan = 'staff';
    public $password;
    public $selectedEmployee = null;

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
            'nama' => $this->employee_name,
            'jabatan' => $this->jabatan,
            'password' => $hashedPassword,
        ]);

        $this->nip_employee = '';
        $this->employee_name = '';
        $this->jabatan = '';
        $this->password = '';

        $this->emit('alert', [
            'type' => 'success',
            'title' => 'Success!',
            'message' => 'User created successfully.'
        ]);
    }

    public function getDetailById($id)
    {
        $selectedEmployee = \App\Models\User::find($id);

        if ($selectedEmployee) {
            $this->selectedEmployee = [
                'id' => $selectedEmployee->id,
                'nip_employee' => $selectedEmployee->nip,
                'employee_name' => $selectedEmployee->nama,
                'jabatan' => $selectedEmployee->jabatan,
            ];
        }
    }


    public function updateEmployee($id)
    {
        $user = \App\Models\User::find($id);

        if ($user) {
            $this->validate([
                'employee_name' => 'required',
                'jabatan' => 'required',
                'password' => 'nullable|min:6',
            ]);

            $user->nama = $this->employee_name;
            $user->jabatan = $this->jabatan;

            if ($this->password) {
                $hashedPassword = Hash::make($this->password);
                $user->password = $hashedPassword;
            }

            $user->save();

            $this->employee_name = '';
            $this->jabatan = '';
            $this->password = '';

            $this->emit('alert', [
                'type' => 'success',
                'title' => 'Success!',
                'message' => 'User updated successfully.'
            ]);
        }
    }

    public function deleteEmployee($id)
    {
        // Find the user by ID
        $user = \App\Models\User::find($id);

        // If the user is found
        if ($user) {
            // Delete the user
            $user->delete();

            // Emit an event to indicate successful deletion
            $this->emit('alert', [
                'type' => 'success',
                'title' => 'Success!',
                'message' => 'User deleted successfully.'
            ]);
        }
    }
}
