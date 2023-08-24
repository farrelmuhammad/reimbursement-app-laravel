<?php

namespace App\Http\Livewire\Dashboard;

use Livewire\Component;

class Home extends Component
{
    public function render()
    {
        // $students = Student::where('name', 'like', '%' . $this->search . '%')
        // ->orWhere('email', 'like', '%' . $this->search . '%')
        // ->paginate($this->perPage);

        // return view('livewire.students-table', compact('students'));
        $students = [];
        return view('livewire.dashboard.home', compact('students'));
    }
}
