<?php

namespace App\Http\Livewire\Dashboard;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Reimbursement;
use App\Models\Employee;
use Illuminate\Support\Facades\DB;

class Home extends Component
{
    use WithFileUploads;

    public $employee_id, $nama_reimbursement, $deskripsi, $file_pendukung;

    public function render()
    {
        $reimbursements = DB::table('reimbursements')
            ->select('reimbursements.*', 'employees.nama as employee_name')
            ->join('employees', 'reimbursements.employee_id', '=', 'employees.id')
            ->get();

        $employees = Employee::all();
        dd($employees, $reimbursements);
        return view('livewire.dashboard.home', compact('reimbursements', 'employees'));
    }
}
