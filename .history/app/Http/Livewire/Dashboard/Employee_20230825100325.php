<?php

namespace App\Http\Livewire\Dashboard;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Employee extends Component
{
    public $employees;

    public function mount()
    {
        $this->employees = DB::table('users')->get();
        dd($this->employees);
    }

    public function render()
    {
        return view('livewire.dashboard.employee', [
            'employees' => $this->employees,
        ]);
    }
}
