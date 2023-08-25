<?php

namespace App\Http\Livewire\Dashboard;

use Illuminate\Support\Facades\Auth;
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
    public $totalApproved;
    public $totalRejected;

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $user = Auth::user();

        $this->totalApproved = $this->getTotalApproved();
        $this->totalRejected = $this->getTotalRejected();

        if ($user->jabatan === 'Direktur') {
            // Jika role adalah direktur, tampilkan semua reimbursements
            $reimbursements = DB::table('reimbursements')
                ->select('reimbursements.*', 'users.nama as employee_name', 'users.nip as employee_nip')
                ->join('users', 'reimbursements.user_id', '=', 'users.id')
                ->where('users.nama', 'like', '%' . $this->search . '%')
                ->orWhere('users.nip', 'like', '%' . $this->search . '%')
                ->orWhere('reimbursements.nama_reimbursement', 'like', '%' . $this->search . '%')
                ->orWhere('reimbursements.deskripsi', 'like', '%' . $this->search . '%')
                ->paginate(5);
        } else {
            // Jika role bukan direktur, tampilkan hanya reimbursements milik user yang login
            $reimbursements = DB::table('reimbursements')
                ->select('reimbursements.*', 'users.nama as employee_name', 'users.nip as employee_nip')
                ->join('users', 'reimbursements.user_id', '=', 'users.id')
                ->where('users.id', $user->id)
                ->where(function ($query) {
                    $query->where('users.nama', 'like', '%' . $this->search . '%')
                        ->orWhere('users.nip', 'like', '%' . $this->search . '%')
                        ->orWhere('reimbursements.nama_reimbursement', 'like', '%' . $this->search . '%')
                        ->orWhere('reimbursements.deskripsi', 'like', '%' . $this->search . '%');
                })
                ->paginate(5);
        }

        return view('livewire.dashboard.home', compact('reimbursements'));
    }

    public function getTotalApproved()
    {
        return DB::table('reimbursements')->where('status', 'approve')->count();
    }

    public function getTotalRejected()
    {
        return DB::table('reimbursements')->where('status', 'reject')->count();
    }

    public function submit()
    {
        $this->validate([
            'reimbursement_name' => 'required',
            'date' => 'required',
            'description' => 'required',
            'document' => 'required|file|mimes:pdf,doc,docx,jpg,png,jpeg'
        ]);

        $reimbursement = \App\Models\Reimbursement::create([
            'user_id' => auth()->user()->id,
            'nama_reimbursement' => $this->reimbursement_name,
            'tanggal' => $this->date,
            'deskripsi' => $this->description,
            'status' => 'pending',
            'file_pendukung' => $this->document->store('documents'), // Store uploaded document
        ]);

        // Upload dokumen jika ada
        if ($this->document) {
            $this->document->storeAs('documents', $reimbursement->id . '_' . $this->document->getClientOriginalName());
        }

        // Reset field setelah penyimpanan berhasil
        $this->reset(['reimbursement_name', 'date', 'description', 'document']);

        $this->emit('alert', [
            'type' => 'success',
            'title' => 'Success!',
            'message' => 'Reimbursement created successfully.'
        ]);

        // Emit event jika diperlukan
        // Livewire.emit('reimbursementCreated', $reimbursement->id);
    }
}
