<?php

namespace App\Http\Livewire\Dashboard;

use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\DB;
use Livewire\WithPagination;

class Home extends Component
{
    use WithFileUploads;
    use WithPagination;

    public $search = '';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $reimbursements = DB::table('reimbursements')
            ->select('reimbursements.*', 'employees.nama as employee_name')
            ->join('employees', 'reimbursements.employee_id', '=', 'employees.id')
            ->where('employees.nama', 'like', '%' . $this->search . '%')
            ->orWhere('employees.nip', 'like', '%' . $this->search . '%')
            ->orWhere('reimbursements.nama_reimbursement', 'like', '%' . $this->search . '%')
            ->orWhere('reimbursements.deskripsi', 'like', '%' . $this->search . '%')
            ->paginate(10);

        return view('livewire.dashboard.home', compact('reimbursements'));
    }

    public function submit()
    {
        $this->validate([
            'employee_id' => 'required',
            'nama_reimbursement' => 'required',
            'deskripsi' => 'required',
            'file_pendukung' => 'required|file|max:10240', // Max size: 10MB
        ]);

        $file = $this->file_pendukung->store('reimbursement_files', 'public');

        DB::table('reimbursements')->insert([
            'employee_id' => $this->employee_id,
            'nama_reimbursement' => $this->nama_reimbursement,
            'deskripsi' => $this->deskripsi,
            'file_pendukung' => $file,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $this->resetForm();
        session()->flash('message', 'Reimbursement created successfully.');
    }
}
