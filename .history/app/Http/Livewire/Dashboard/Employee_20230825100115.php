<?php

namespace App\Http\Livewire\Dashboard;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Employee extends Component
{
    public $employee;

    public function mount()
    {
        $this->employee = DB::table('users')->get();
    }

    public function render()
    {
        return view('livewire.dashboard.employee', [
            'employee' => $this->employee,
        ]);
    }
}
