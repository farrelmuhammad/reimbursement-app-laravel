<?php

namespace App\Http\Livewire\Dashboard;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Employee extends Component
{
    public function render()
    {
        $employees = DB::table('users')->get();
        // dd($employees);
        return view('livewire.dashboard.employee', compact('employees'));
    }
}
