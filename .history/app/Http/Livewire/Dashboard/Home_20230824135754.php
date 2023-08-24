<?php

namespace App\Http\Livewire\Dashboard;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Reimbursement;
use App\Models\Employee;

class Home extends Component
{
    use WithFileUploads;

    public $employee_id, $nama_reimbursement, $deskripsi, $file_pendukung;

    public function render()
    {
        $reimbursements = Reimbursement::with('employee')->get();
        $employees = Employee::all();
        dd($employees, $reimbursements);
        return view('livewire.dashboard.home', compact('reimbursements', 'employees'));
    }
}
