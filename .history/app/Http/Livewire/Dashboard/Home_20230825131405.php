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
    public $reimbursement_name;
    public $date;
    public $description;
    public $document;

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $reimbursements = DB::table('reimbursements')
            ->select('reimbursements.*', 'users.nama as employee_name', 'users.nip as employee_nip')
            ->join('users', 'reimbursements.user_id', '=', 'users.id')
            ->where('users.nama', 'like', '%' . $this->search . '%')
            ->orWhere('users.nip', 'like', '%' . $this->search . '%')
            ->orWhere('reimbursements.nama_reimbursement', 'like', '%' . $this->search . '%')
            ->orWhere('reimbursements.deskripsi', 'like', '%' . $this->search . '%')
            ->paginate(5);

        return view('livewire.dashboard.home', compact('reimbursements'));
    }

    public function submit()
    {
        $data = [
            'reimbursement_name' => $this->reimbursement_name,
            'date' => $this->date,
            'description' => $this->description,
            'document' => $this->document,
        ];
        dd($data);
       $this->validate([
            'reimbursement_name' => 'required',
            'date' => 'required',
            'description' => 'required',
            'document' => 'required',
        ]);

        $reimbursement = \App\Models\Reimbursement::create([
            'user_id' => auth()->user()->id,
            'reimbursement_name' => $this->reimbursementName,
            'date' => $this->date,
            'description' => $this->description,
            // Simpan data lainnya
        ]);

        // Upload dokumen jika ada
        if ($this->document) {
            $this->document->storeAs('documents', $reimbursement->id . '_' . $this->document->getClientOriginalName());
        }

        // Reset field setelah penyimpanan berhasil
        $this->reset(['reimbursementName', 'date', 'description', 'document']);

        // Tampilkan pesan sukses
        session()->flash('success', 'Pengajuan berhasil dibuat.');

        // Emit event jika diperlukan
        // Livewire.emit('reimbursementCreated', $reimbursement->id);
    }
}
