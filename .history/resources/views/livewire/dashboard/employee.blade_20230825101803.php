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
                        Daftar Karyawan
                    </div>

                    <!-- Tombol Ajukan Permohonan di pojok kanan -->
                    <div x-data="{ modalOpen_1: false }">
                        <button @click="modalOpen_1 =!modalOpen_1"
                            class="bg-orange-500 hover:bg-orange-600 text-white font-semibold py-2 px-4 rounded-lg">
                            <i class="fa-solid fa-plus mr-2"></i>
                            Tambah Karyawan
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
                                    <form>
                                        <div class="mt-6">
                                            <label for="nip_employeee"
                                                class="block text-sm font-medium text-gray-700">NIP Karyawan</label>
                                            <input type="text" id="nip_employeee" name="nip_employeee"
                                                class="mt-1 px-3 py-2 block w-full border rounded-md shadow-sm focus:ring focus:ring-opacity-50 focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                        </div>

                                        <div class="mt-6">
                                            <label for="employee_name"
                                                class="block text-sm font-medium text-gray-700">Nama Karyawan</label>
                                            <input type="text" id="employee_name" name="employee_name"
                                                class="mt-1 px-3 py-2 block w-full border rounded-md shadow-sm focus:ring focus:ring-opacity-50 focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                        </div>

                                        <div class="mt-6">
                                            <label for="role" class="block text-sm font-medium text-gray-700">Pilih
                                                Jabatan</label>
                                            <select id="jabatan" name="jabatan"
                                                class="mt-1 px-3 py-2 block w-full border rounded-md shadow-sm focus:ring focus:ring-opacity-50 focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                                <option value="staff">Staff</option>
                                                <option value="direktur">Direktur</option>
                                                <option value="finance">Finance</option>
                                            </select>
                                        </div>

                                        <div class="mt-6" x-data="{ show: true }">
                                            <label for="password" class="block text-sm font-medium text-gray-700">NIP
                                                Karyawan</label>
                                            <input :type="show ? 'password' : 'text'" wire:model="password"
                                                class="mt-1 px-3 py-2 block w-full border rounded-md shadow-sm focus:ring focus:ring-opacity-50 focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                        </div>

                                        <div class="flex justify-between mt-6 space-x-4">
                                            <button @click="modalOpen_1 = false"
                                                class="bg-gray-300 text-gray-700 active:bg-gray-500 text-sm font-bold px-6 py-3 rounded-lg shadow hover:shadow-lg outline-none focus:outline-none w-1/2 ease-linear transition-all duration-150 text-center cursor-pointer"
                                                type="button">
                                                Batal
                                            </button>
                                            <button @click="modalOpen_1 = false"
                                                class="bg-green-500 text-white active:bg-primary-3 text-sm font-bold px-6 py-3 rounded-lg shadow hover:shadow-lg outline-none focus:outline-none w-1/2 ease-linear transition-all duration-150 text-center cursor-pointer"
                                                type="submit">
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
                        @if ($employees->isEmpty())
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
                                            Jabatan
                                        </th>
                                        <th
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Action
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @foreach ($employees as $index => $employee)
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                {{ $index + 1 }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                {{ $employee->nip }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                {{ $employee->nama }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                {{ $employee->jabatan }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <button
                                                    class="px-4 py-2 text-sm bg-green-500 text-white rounded hover:bg-green-600"
                                                    onclick="actionReimbursement({{ $employee->id }}, 'approve')">Update</button>
                                                <button
                                                    class="px-4 py-2 text-sm bg-red-500 text-white rounded hover:bg-red-600 ml-2"
                                                    onclick="actionReimbursement({{ $employee->id }}, 'reject')">Delete</button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>

                            </table>
                        @endif

                        <div class="mt-4">
                            {{ $employees->links() }}
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
