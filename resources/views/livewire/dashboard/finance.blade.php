@push('additional-style')
    <style>
        [x-cloak] {
            display: none;
        }
    </style>
@endpush
<div class="min-w-screen min-h-screen bg-gray-200">
    @include('layouts.navbar')
    <div class="flex p-10">
        @include('layouts.sidebar')
        <div class="ml-10 w-full">
            <div class="bg-white rounded-lg p-6 my-5 w-full">
                <div class="flex justify-between items-center mb-2">
                    <div class="text-lg font-semibold">
                        Daftar Reimbursement
                    </div>
                </div>

                <div x-data="app()" x-init="init()">
                    <div>
                        <input wire:model="search" type="text" placeholder="Search by name or email..."
                            class="mb-4 p-2 border rounded">
                        @if ($reimbursements->isEmpty())
                            <p class="text-red-500">Data not found.</p>
                        @else
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead>
                                    <tr>
                                        <th
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            No.
                                        </th>
                                        <th
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            NIP Karyawan
                                        </th>
                                        <th
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Nama Karyawan
                                        </th>
                                        <th
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Nama Reimbursement
                                        </th>
                                        <th
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Deskripsi
                                        </th>
                                        <th
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Tanggal Pengajuan
                                        </th>
                                        <th
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Status
                                        </th>
                                        {{-- <th
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            File
                                        </th> --}}
                                        <th
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Action
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @foreach ($reimbursements as $index => $reimbursement)
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                {{ $index + 1 }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                {{ $reimbursement->employee_nip }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                {{ $reimbursement->employee_name }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                {{ $reimbursement->nama_reimbursement }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                {{ $reimbursement->deskripsi }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                {{ $reimbursement->tanggal }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                @if ($reimbursement->status === 'pending')
                                                    <span
                                                        class="inline-block rounded-lg bg-yellow-500 px-2 py-1 text-white text-xs font-semibold text-center uppercase">
                                                        {{ $reimbursement->status }}
                                                    </span>
                                                @elseif ($reimbursement->status === 'approved')
                                                    <span
                                                        class="inline-block rounded-lg bg-green-500 px-2 py-1 text-white text-xs font-semibold text-center uppercase">
                                                        {{ $reimbursement->status }}
                                                    </span>
                                                @elseif ($reimbursement->status === 'rejected')
                                                    <span
                                                        class="inline-block rounded-lg bg-red-500 px-2 py-1 text-white text-xs font-semibold text-center uppercase">
                                                        {{ $reimbursement->status }}
                                                    </span>
                                                @endif
                                            </td>


                                            {{-- <td class="px-6 py-4 whitespace-nowrap">
                                                {{ $reimbursement->file_pendukung }}
                                            </td> --}}
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <button
                                                    class="px-4 py-2 text-sm bg-blue-500 text-white rounded hover:bg-blue-600"
                                                    onclick="showDetails({{ $reimbursement->id }})">Details</button>
                                                @if (Auth::user()->jabatan === 'Direktur')
                                                    <button
                                                        class="px-4 py-2 text-sm bg-green-500 text-white rounded hover:bg-green-600"
                                                        onclick="actionReimbursement({{ $reimbursement->id }}, 'approve')">Approve</button>
                                                    <button
                                                        class="px-4 py-2 text-sm bg-red-500 text-white rounded hover:bg-red-600"
                                                        onclick="actionReimbursement({{ $reimbursement->id }}, 'reject')">Reject</button>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>

                            </table>
                        @endif

                        <div class="mt-4">
                            {{ $reimbursements->links() }}
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<script>
    function actionReimbursement(id, string) {
        console.log(id, string)
        // Livewire.emit('getDetail', id);
    }
</script>
