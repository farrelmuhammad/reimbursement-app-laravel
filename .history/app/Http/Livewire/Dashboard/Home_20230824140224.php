<?php

namespace App\Http\Livewire\Dashboard;

use Livewire\Component;
use Livewire\WithFileUploads;
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

        // dd($reimbursements);
        return view('livewire.dashboard.home', compact('reimbursements'));
    }
}
