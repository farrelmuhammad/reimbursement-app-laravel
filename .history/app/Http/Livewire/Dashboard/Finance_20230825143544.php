<?php

namespace App\Http\Livewire\Dashboard;

use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class Finance extends Component
{
    use WithPagination;

    public $search = '';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $reimbursements = DB::table('reimbursements')
            ->select('reimbursements.*', 'users.nama as employee_name', 'users.nip as employee_nip')
            ->join('users', 'reimbursements.user_id', '=', 'users.id')
            ->where('reimbursements.status', 'approve') // Hanya tampilkan status approve
            ->where(function ($query) {
                $query->where('users.nama', 'like', '%' . $this->search . '%')
                    ->orWhere('users.nip', 'like', '%' . $this->search . '%')
                    ->orWhere('reimbursements.nama_reimbursement', 'like', '%' . $this->search . '%')
                    ->orWhere('reimbursements.deskripsi', 'like', '%' . $this->search . '%');
            })
            ->paginate(5);

        dd($reimbursements);

        return view('livewire.dashboard.finance', compact('reimbursements'));
    }
}
