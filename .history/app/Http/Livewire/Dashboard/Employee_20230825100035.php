<?php

namespace App\Http\Livewire\Dashboard;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Employee extends Component
{
    public $users;

    public function mount()
    {
        $this->users = DB::table('users')->get();
    }

    public function render()
    {
        return view('livewire.dashboard.employee', [
            'users' => $this->users,
        ]);
    }
}
