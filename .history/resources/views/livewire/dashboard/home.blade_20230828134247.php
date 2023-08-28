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
            <div class="grid grid-cols-3 gap-6">
                <!-- Kotak 1: Total Overtime -->
                <div class="bg-gradient-to-r from-blue-500 to-blue-600 rounded-lg p-6 text-white flex flex-col">
                    <h2 class="text-lg font-semibold mb-2">Total Overtime</h2>
                    <p class="text-2xl font-bold self-end">8 hours</p>
                </div>

                <!-- Kotak 2: Jatah Cuti -->
                <div class="bg-gradient-to-r from-green-500 to-green-600 rounded-lg p-6 text-white flex flex-col">
                    <h2 class="text-lg font-semibold mb-2">Reimbursement Disetujui</h2>
                    <p class="text-2xl font-bold self-end">{{ $totalApproved }}</p>
                </div>

                <!-- Kotak 3: Overtime Ditolak -->
                <div class="bg-gradient-to-r from-red-500 to-red-600 rounded-lg p-6 text-white flex flex-col">
                    <h2 class="text-lg font-semibold mb-2">Reimbursement Ditolak</h2>
                    <p class="text-2xl font-bold self-end">{{ $totalRejected }}</p>
                </div>

            </div>
            <div class="bg-white rounded-lg p-6 my-5 w-full">
                <div class="flex justify-between items-center mb-2">
                    <div class="text-lg font-semibold">
                        Daftar Cuti
                    </div>

                    <!-- Tombol Ajukan Permohonan di pojok kanan -->
                    <div x-data="{ modalOpen_1: false }">
                        <button @click="modalOpen_1 =!modalOpen_1"
                            class="bg-orange-500 hover:bg-orange-600 text-white font-semibold py-2 px-4 rounded-lg">
                            <i class="fa-solid fa-plus mr-2"></i>
                            Ajukan Permohonan
                        </button>
                        <div x-show="modalOpen_1" class="fixed inset-0 z-50 overflow-y-auto"
                            aria-labelledby="modal-title" role="dialog" aria-modal="true">
                            <div
                                class="flex items-end justify-center min-h-screen px-4 text-center md:items-center sm:block sm:p-0">
                                <div x-cloak @click="modalOpen_1 = false" x-show="modalOpen_1"
                                    x-transition:enter="transition ease-out duration-300 transform"
                                    x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                                    x-transition:leave="transition ease-in duration-200 transform"
                                    x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
                                    class="fixed inset-0 transition-opacity bg-gray-500 bg-opacity-40"
                                    aria-hidden="true">
                                </div>

                                <div x-cloak x-show="modalOpen_1"
                                    x-transition:enter="transition ease-out duration-300 transform"
                                    x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                                    x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                                    x-transition:leave="transition ease-in duration-200 transform"
                                    x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                                    x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                                    class="inline-block w-full max-w-xl p-8 my-20 overflow-hidden text-left transition-all transform bg-white rounded-lg shadow-xl 2xl:max-w-2xl">
                                    <div class="flex items-center justify-between space-x-4">
                                        <h1 class="text-xl font-medium text-gray-900">Permohonan Reimbursement</h1>

                                        <button @click="modalOpen_1 = false"
                                            class="text-gray-900 focus:outline-none hover:text-gray-700">
                                            <i class="fas fa-xmark"></i>
                                        </button>
                                    </div>

                                    <!-- Form Input -->
                                    <form wire:submit.prevent="submit" enctype="multipart/form-data">
                                        <div class="mt-6">
                                            <label for="employee_name"
                                                class="block text-sm font-medium text-gray-700">Nama Karyawan</label>
                                            <input type="text" id="employee_name" name="employee_name"
                                                value="{{ Auth::user()->nama }}" disabled
                                                class="mt-1 px-3 py-2 block w-full border rounded-md shadow-sm focus:ring focus:ring-opacity-50 focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                        </div>

                                        <div class="mt-6">
                                            <label for="reimbursement_name"
                                                class="block text-sm font-medium text-gray-700">Nama
                                                Reimbursement</label>
                                            <input type="text" id="reimbursement_name" name="reimbursement_name"
                                                wire:model="reimbursement_name"
                                                class="mt-1 px-3 py-2 block w-full border rounded-md shadow-sm focus:ring focus:ring-opacity-50 focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                        </div>

                                        <div class="mt-6">
                                            <label for="date" class="block text-sm font-medium text-gray-700">Pilih
                                                Tanggal</label>
                                            <input type="date" id="date" name="date" wire:model="date"
                                                class="mt-1 px-3 py-2 block w-full border rounded-md shadow-sm focus:ring focus:ring-opacity-50 focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                        </div>

                                        <div class="mt-6">
                                            <label for="description"
                                                class="block text-sm font-medium text-gray-700">Deskripsi</label>
                                            <textarea id="description" name="description" rows="3" wire:model="description"
                                                class="mt-1 px-3 py-2 block w-full border rounded-md shadow-sm focus:ring focus:ring-opacity-50 focus:ring-blue-500 focus:border-blue-500 sm:text-sm"></textarea>
                                        </div>

                                        <div class="mt-6">
                                            <label for="document" class="block text-sm font-medium text-gray-700">Upload
                                                Dokumen</label>
                                            <input type="file" id="document" name="document" wire:model="document"
                                                class="mt-1 px-3 py-2 block w-full border rounded-md shadow-sm focus:ring focus:ring-opacity-50 focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                        </div>


                                        <div class="flex justify-between mt-6 space-x-4">
                                            <button @click="modalOpen_1 = false"
                                                class="bg-gray-300 text-gray-700 active:bg-gray-500 text-sm font-bold px-6 py-3 rounded-lg shadow hover:shadow-lg outline-none focus:outline-none w-1/2 ease-linear transition-all duration-150 text-center cursor-pointer"
                                                type="button">
                                                Batal
                                            </button>
                                            <button type="submit"
                                                class="bg-green-500 text-white active:bg-primary-3 text-sm font-bold px-6 py-3 rounded-lg shadow hover:shadow-lg outline-none focus:outline-none w-1/2 ease-linear transition-all duration-150 text-center cursor-pointer">
                                                Submit
                                            </button>
                                        </div>
                                    </form>

                                </div>

                            </div>
                        </div>
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
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                @if (Auth::user()->jabatan === 'Direktur' || Auth::user()->jabatan === 'Finance')
                                                    @if ($reimbursement->status === 'pending')
                                                        <button
                                                            class="px-4 py-2 text-sm bg-green-500 text-white rounded hover:bg-green-600"
                                                            onclick="actionReimbursement({{ $reimbursement->id }}, 'approved')">Approve</button>
                                                        <button
                                                            class="px-4 py-2 text-sm bg-red-500 text-white rounded hover:bg-red-600"
                                                            onclick="actionReimbursement({{ $reimbursement->id }}, 'rejected')">Reject</button>
                                                    @endif
                                                @endif
                                                <div x-data="{ modalOpen_2: false }">
                                                    <button @click="modalOpen_2 =!modalOpen_2"
                                                        class="px-4 py-2 text-sm bg-blue-500 text-white rounded hover:bg-blue-600"
                                                        wire:click="showDetails({{ $reimbursement->id }})">Details</button>
                                                    <div x-show="modalOpen_2"
                                                        class="fixed inset-0 z-50 overflow-y-auto"
                                                        aria-labelledby="modal-title" role="dialog"
                                                        aria-modal="true">
                                                        <div
                                                            class="flex items-end justify-center min-h-screen px-4 text-center md:items-center sm:block sm:p-0">
                                                            <div x-cloak @click="modalOpen_2 = false"
                                                                x-show="modalOpen_2"
                                                                x-transition:enter="transition ease-out duration-300 transform"
                                                                x-transition:enter-start="opacity-0"
                                                                x-transition:enter-end="opacity-100"
                                                                x-transition:leave="transition ease-in duration-200 transform"
                                                                x-transition:leave-start="opacity-100"
                                                                x-transition:leave-end="opacity-0"
                                                                class="fixed inset-0 transition-opacity bg-gray-500 bg-opacity-40"
                                                                aria-hidden="true">
                                                            </div>

                                                            <div x-cloak x-show="modalOpen_2"
                                                                x-transition:enter="transition ease-out duration-300 transform"
                                                                x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                                                                x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                                                                x-transition:leave="transition ease-in duration-200 transform"
                                                                x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                                                                x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                                                                class="inline-block w-full max-w-xl p-8 my-20 overflow-hidden text-left transition-all transform bg-white rounded-lg shadow-xl 2xl:max-w-2xl">
                                                                <div
                                                                    class="flex items-center justify-between space-x-4">
                                                                    <h1 class="text-xl font-medium text-gray-900">
                                                                        Detail Reimbursement
                                                                    </h1>

                                                                    <button @click="modalOpen_2 = false"
                                                                        class="text-gray-900 focus:outline-none hover:text-gray-700">
                                                                        <i class="fas fa-xmark"></i>
                                                                    </button>
                                                                </div>
                                                                @if ($selectedReimbursement)
                                                                    <div class="mt-6">
                                                                        <label for="employee_name"
                                                                            class="block text-sm font-medium text-gray-700">Nama
                                                                            Karyawan</label>
                                                                        <input type="text" id="employee_name"
                                                                            name="employee_name"
                                                                            value="{{ $selectedReimbursement['employee_name'] }}"
                                                                            disabled
                                                                            class="mt-1 px-3 py-2 block w-full border rounded-md shadow-sm focus:ring focus:ring-opacity-50 focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                                                    </div>

                                                                    <div class="mt-6">
                                                                        <label for="nama_reimbursement"
                                                                            class="block text-sm font-medium text-gray-700">Nama
                                                                            Reimbursement</label>
                                                                        <input type="text" id="nama_reimbursement"
                                                                            name="nama_reimbursement"
                                                                            value="{{ $selectedReimbursement['nama_reimbursement'] }}"
                                                                            disabled
                                                                            class="mt-1 px-3 py-2 block w-full border rounded-md shadow-sm focus:ring focus:ring-opacity-50 focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                                                    </div>

                                                                    <div class="mt-6">
                                                                        <label for="tanggal"
                                                                            class="block text-sm font-medium text-gray-700">Pilih
                                                                            Tanggal</label>
                                                                        <input type="date" id="tanggal"
                                                                            name="tanggal" 
                                                                            value="{{ $selectedReimbursement['tanggal'] }}"
                                                                            disabled
                                                                            class="mt-1 px-3 py-2 block w-full border rounded-md shadow-sm focus:ring focus:ring-opacity-50 focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                                                    </div>

                                                                    <div class="mt-6">
                                                                        <label for="description"
                                                                            class="block text-sm font-medium text-gray-700">Deskripsi</label>
                                                                        <textarea id="description" name="description" rows="3" wire:model="description"
                                                                            class="mt-1 px-3 py-2 block w-full border rounded-md shadow-sm focus:ring focus:ring-opacity-50 focus:ring-blue-500 focus:border-blue-500 sm:text-sm"></textarea>
                                                                    </div>

                                                                    <div class="mt-6">
                                                                        <label for="document"
                                                                            class="block text-sm font-medium text-gray-700">Upload
                                                                            Dokumen</label>
                                                                        <input type="file" id="document"
                                                                            name="document" wire:model="document"
                                                                            class="mt-1 px-3 py-2 block w-full border rounded-md shadow-sm focus:ring focus:ring-opacity-50 focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                                                    </div>
                                                                @else
                                                                    <p>No reimbursement selected.</p>
                                                                @endif
                                                                <!-- Form Input -->
                                                                {{-- <form wire:submit.prevent="submit"
                                                                    enctype="multipart/form-data">
                                                                    <div class="mt-6">
                                                                        <label for="employee_name"
                                                                            class="block text-sm font-medium text-gray-700">Nama
                                                                            Karyawan</label>
                                                                        <input type="text" id="employee_name"
                                                                            name="employee_name"
                                                                            value="{{ $selectedReimbursement['employee_name'] }}"
                                                                            disabled
                                                                            class="mt-1 px-3 py-2 block w-full border rounded-md shadow-sm focus:ring focus:ring-opacity-50 focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                                                    </div>

                                                                    <div class="mt-6">
                                                                        <label for="reimbursement_name"
                                                                            class="block text-sm font-medium text-gray-700">Nama
                                                                            Reimbursement</label>
                                                                        <input type="text" id="reimbursement_name"
                                                                            name="reimbursement_name"
                                                                            wire:model="reimbursement_name"
                                                                            class="mt-1 px-3 py-2 block w-full border rounded-md shadow-sm focus:ring focus:ring-opacity-50 focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                                                    </div>

                                                                    <div class="mt-6">
                                                                        <label for="date"
                                                                            class="block text-sm font-medium text-gray-700">Pilih
                                                                            Tanggal</label>
                                                                        <input type="date" id="date"
                                                                            name="date" wire:model="date"
                                                                            class="mt-1 px-3 py-2 block w-full border rounded-md shadow-sm focus:ring focus:ring-opacity-50 focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                                                    </div>

                                                                    <div class="mt-6">
                                                                        <label for="description"
                                                                            class="block text-sm font-medium text-gray-700">Deskripsi</label>
                                                                        <textarea id="description" name="description" rows="3" wire:model="description"
                                                                            class="mt-1 px-3 py-2 block w-full border rounded-md shadow-sm focus:ring focus:ring-opacity-50 focus:ring-blue-500 focus:border-blue-500 sm:text-sm"></textarea>
                                                                    </div>

                                                                    <div class="mt-6">
                                                                        <label for="document"
                                                                            class="block text-sm font-medium text-gray-700">Upload
                                                                            Dokumen</label>
                                                                        <input type="file" id="document"
                                                                            name="document" wire:model="document"
                                                                            class="mt-1 px-3 py-2 block w-full border rounded-md shadow-sm focus:ring focus:ring-opacity-50 focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                                                    </div>


                                                                    <div class="flex justify-between mt-6 space-x-4">
                                                                        <button @click="modalOpen_2 = false"
                                                                            class="bg-gray-300 text-gray-700 active:bg-gray-500 text-sm font-bold px-6 py-3 rounded-lg shadow hover:shadow-lg outline-none focus:outline-none w-1/2 ease-linear transition-all duration-150 text-center cursor-pointer"
                                                                            type="button">
                                                                            Batal
                                                                        </button>
                                                                        <button type="submit"
                                                                            class="bg-green-500 text-white active:bg-primary-3 text-sm font-bold px-6 py-3 rounded-lg shadow hover:shadow-lg outline-none focus:outline-none w-1/2 ease-linear transition-all duration-150 text-center cursor-pointer">
                                                                            Submit
                                                                        </button>
                                                                    </div>
                                                                </form> --}}

                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
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
        // console.log(id, string)
        Livewire.emit('updateStatus', id, string);
    }
</script>
