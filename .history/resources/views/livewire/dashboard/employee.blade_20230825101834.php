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
                                            <div class="absolute top-0 right-0 mt-4 mr-4 text-gray-400">
                                                <svg class="h-4 text-gray-500 hover:text-primary-3" fill="none"
                                                    @click="show = !show" :class="{ 'hidden': !show, 'block': show }"
                                                    xmlns="http://www.w3.org/2000/svg" viewbox="0 0 576 512">
                                                    <path fill="currentColor"
                                                        d="M572.52 241.4C518.29 135.59 410.93 64 288 64S57.68 135.64 3.48 241.41a32.35 32.35 0 0 0 0 29.19C57.71 376.41 165.07 448 288 448s230.32-71.64 284.52-177.41a32.35 32.35 0 0 0 0-29.19zM288 400a144 144 0 1 1 144-144 143.93 143.93 0 0 1-144 144zm0-240a95.31 95.31 0 0 0-25.31 3.79 47.85 47.85 0 0 1-66.9 66.9A95.78 95.78 0 1 0 288 160z">
                                                    </path>
                                                </svg>

                                                <svg class="h-4 text-gray-500 hover:text-primary-3" fill="none"
                                                    @click="show = !show" :class="{ 'block': !show, 'hidden': show }"
                                                    xmlns="http://www.w3.org/2000/svg" viewbox="0 0 640 512">
                                                    <path fill="currentColor"
                                                        d="M320 400c-75.85 0-137.25-58.71-142.9-133.11L72.2 185.82c-13.79 17.3-26.48 35.59-36.72 55.59a32.35 32.35 0 0 0 0 29.19C89.71 376.41 197.07 448 320 448c26.91 0 52.87-4 77.89-10.46L346 397.39a144.13 144.13 0 0 1-26 2.61zm313.82 58.1l-110.55-85.44a331.25 331.25 0 0 0 81.25-102.07 32.35 32.35 0 0 0 0-29.19C550.29 135.59 442.93 64 320 64a308.15 308.15 0 0 0-147.32 37.7L45.46 3.37A16 16 0 0 0 23 6.18L3.37 31.45A16 16 0 0 0 6.18 53.9l588.36 454.73a16 16 0 0 0 22.46-2.81l19.64-25.27a16 16 0 0 0-2.82-22.45zm-183.72-142l-39.3-30.38A94.75 94.75 0 0 0 416 256a94.76 94.76 0 0 0-121.31-92.21A47.65 47.65 0 0 1 304 192a46.64 46.64 0 0 1-1.54 10l-73.61-56.89A142.31 142.31 0 0 1 320 112a143.92 143.92 0 0 1 144 144c0 21.63-5.29 41.79-13.9 60.11z">
                                                    </path>
                                                </svg>
                                            </div>
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
