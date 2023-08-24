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
                    <h2 class="text-lg font-semibold mb-2">Jatah Cuti</h2>
                    <p class="text-2xl font-bold self-end">10 days</p>
                </div>

                <!-- Kotak 3: Overtime Ditolak -->
                <div class="bg-gradient-to-r from-red-500 to-red-600 rounded-lg p-6 text-white flex flex-col">
                    <h2 class="text-lg font-semibold mb-2">Overtime Ditolak</h2>
                    <p class="text-2xl font-bold self-end">2 hours</p>
                </div>

            </div>
            <div class="bg-white rounded-lg p-6 my-5 w-full">
                <div class="flex justify-between items-center mb-2">
                    <div class="text-lg font-semibold">
                        Daftar Cuti
                    </div>

                    <!-- Tombol Ajukan Permohonan di pojok kanan -->
                    <button class="bg-orange-500 hover:bg-orange-600 text-white font-semibold py-2 px-4 rounded-lg">
                        <i class="fa-solid fa-plus mr-2"></i>
                        Ajukan Permohonan
                    </button>
                </div>
                <div x-data="{ modalOpen_2: false}" class="h-[363px] w-[560px] mt-4">
                    <div x-show="modalOpen_2" class="fixed inset-0 z-50 overflow-y-auto" aria-labelledby="modal-title"
                        role="dialog" aria-modal="true">
                        <div
                            class="flex items-end justify-center min-h-screen px-4 text-center md:items-center sm:block sm:p-0">
                            <div x-cloak @click="modalOpen_2 = true" x-show="modalOpen_2"
                                x-transition:enter="transition ease-out duration-300 transform"
                                x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                                x-transition:leave="transition ease-in duration-200 transform"
                                x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
                                class="fixed inset-0 transition-opacity bg-gray-500 bg-opacity-40" aria-hidden="true">
                            </div>

                            <div x-cloak x-show="modalOpen_2"
                                x-transition:enter="transition ease-out duration-300 transform"
                                x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                                x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                                x-transition:leave="transition ease-in duration-200 transform"
                                x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                                x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                                class="inline-block w-full max-w-xl p-8 my-20 overflow-hidden text-left transition-all transform bg-white rounded-lg shadow-xl 2xl:max-w-2xl">

                                <h1 class="text-xl font-bold">Permohonan Reimbursement</h1>
                                <p class="mt-10 text-gray-600">Click button sign agreement and you'll enjoy access to
                                    our apps, plus other benefits, with this agreement you will enjoy all the benefits
                                    in nawapay.</p>

                                <div class="flex mt-10 space-x-4">
                                    <button @click="modalOpen_2 = false"
                                        class="bg-gray-300 text-gray-700 active:bg-gray-500 text-sm font-bold px-6 py-3 rounded-lg shadow hover:shadow-lg outline-none focus:outline-none w-1/2 ease-linear transition-all duration-150 text-center cursor-pointer"
                                        type="button">
                                        Batal
                                    </button>
                                    <a wire:click="signAgreement" @click="modalOpen_2 = false"
                                        class="bg-green-500 text-white active:bg-primary-3 text-sm font-bold px-6 py-3 rounded-lg shadow hover:shadow-lg outline-none focus:outline-none w-1/2 ease-linear transition-all duration-150 text-center cursor-pointer"
                                        type="button">
                                        Submit
                                    </a>
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
                                            File
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
                                                {{ $reimbursement->file_pendukung }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <button
                                                    class="px-4 py-2 text-sm bg-green-500 text-white rounded hover:bg-green-600"
                                                    onclick="actionReimbursement({{ $reimbursement->id }}, 'approve')">Approve</button>
                                                <button
                                                    class="px-4 py-2 text-sm bg-red-500 text-white rounded hover:bg-red-600 ml-2"
                                                    onclick="actionReimbursement({{ $reimbursement->id }}, 'reject')">Reject</button>
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
