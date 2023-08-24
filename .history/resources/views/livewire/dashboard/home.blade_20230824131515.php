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
                <!-- Nama di sebelah kiri -->

                <div x-data="app()" x-init="init()">
                    <div class="flex justify-between items-center my-2">
                        <div class="flex">
                            <div>
                                <div class="flex items-center ml-4">
                                    <label for="paginate" class="text-nowrap me-2">Per Page</label>
                                    <select name="paginate" id="paginate" class="form-select form-select-sm"
                                        wire:model="paginate">
                                        <option value="10">10</option>
                                        <option value="20">20</option>
                                        <option value="30">30</option>
                                    </select>
                                </div>
                            </div>
                            <div>
                                <div class="flex items-center ms-4">
                                    <label for="paginate" class="text-nowrap me-2">FilterBy Class</label>
                                    <select class="form-select form-select-sm" wire:model="selectedClass">
                                        <option value="">All Class</option>
                                        {{-- @foreach ($classes as $class)
                                            <option value="{{ $class->id }}">{{ $class->name }}</option>
                                        @endforeach --}}
                                    </select>
                                </div>
                            </div>

                            <div x-show="selectedClass" x-transition>
                                <div class="flex items-center ms-4">
                                    <label for="paginate" class="text-nowrap me-2 mb-0">Section</label>
                                    <select class="form-select form-select-sm" wire:model="selectedSection">
                                        <option value="">Select a Section</option>
                                        {{-- @foreach ($sections as $section)
                                            <option value="{{ $section->id }}">{{ $section->name }}</option>
                                        @endforeach --}}
                                    </select>
                                </div>
                            </div>

                            <div class="dropdown ms-4" x-show="checked.length > 0" x-transition>
                                <button class="btn btn-secondary dropdown-toggle" type="button"
                                    id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                    With Checked (<span x-text="checked.length"></span>)
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                    <li><a href="#" class="dropdown-item" type="button"
                                            onclick="confirm('Are you sure you want to delete these records?') || event.stopImmediatePropagation()"
                                            @click="deleteMultipleRecords">
                                            Delete
                                        </a>
                                    </li>
                                    <li><a href="#" @click="exportStudents" class="dropdown-item" type="button">
                                            Export
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <input wire:model.debounce.500ms="search" type="search" class="form-input"
                                placeholder="Search by name,email,phone,or address...">
                        </div>
                    </div>

                    <br>

                    <div class="col-md-10 mb-3" x-transition>
                        <div x-show="selectAll && selectPage">
                            You are currently selecting <strong x-text="checked.length"></strong> items.
                        </div>
                        <div x-show="selectPage && !selectAll">
                            You have selected <strong x-text="checked.length"></strong> items, Do you want to Select All
                            <strong x-text="allStudents.length"></strong> items?
                            <a href="#" @click="selectAllItems" class="ml-2">Select All</a>
                        </div>
                    </div>

                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover">
                            <tbody>
                                <tr>
                                    <th><input type="checkbox" x-model="selectPage"></th>
                                    <th>
                                        <a href="#" wire:click="changeSort('name')">
                                            Student's Name
                                            <span x-show="sortDirection == 'desc' && sortField == 'name'">&uarr;</span>
                                            <span x-show="sortDirection == 'asc' && sortField == 'name'">&darr;</span>
                                        </a>
                                    </th>
                                    <th>
                                        <a href="#" wire:click="changeSort('email')">
                                            Email
                                            <span x-show="sortDirection == 'desc' && sortField == 'email'">&uarr;</span>
                                            <span x-show="sortDirection == 'asc' && sortField == 'email'">&darr;</span>
                                        </a>
                                    </th>
                                    <th>
                                        <a href="#" wire:click="changeSort('address')">
                                            Address
                                            <span
                                                x-show="sortDirection == 'desc' && sortField == 'address'">&uarr;</span>
                                            <span
                                                x-show="sortDirection == 'asc' && sortField == 'address'">&darr;</span>
                                        </a>
                                    </th>
                                    <th>
                                        <a href="#" wire:click="changeSort('phone_number')">
                                            Phone Number
                                            <span
                                                x-show="sortDirection == 'desc' && sortField == 'phone_number'">&uarr;</span>
                                            <span
                                                x-show="sortDirection == 'asc' && sortField == 'phone_number'">&darr;</span>
                                        </a>
                                    </th>
                                    <th>Class</th>
                                    <th>Section</th>
                                    <th>Action</th>
                                </tr>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function app() {
            return {
                init() {
                    this.generateRandomData();
                },
                generateRandomData() {
                    const names = ['John Doe', 'Jane Smith', 'Robert Johnson', 'Emily Brown', 'Michael Davis'];
                    const emails = ['john@example.com', 'jane@example.com', 'robert@example.com', 'emily@example.com',
                        'michael@example.com'
                    ];

                    const tbody = document.querySelector('#tableExample tbody');

                    for (let i = 0; i < 10; i++) {
                        const randomName = names[Math.floor(Math.random() * names.length)];
                        const randomEmail = emails[Math.floor(Math.random() * emails.length)];

                        const row = document.createElement('tr');
                        const nameCell = document.createElement('td');
                        const emailCell = document.createElement('td');

                        nameCell.textContent = randomName;
                        emailCell.textContent = randomEmail;

                        row.appendChild(nameCell);
                        row.appendChild(emailCell);

                        tbody.appendChild(row);
                    }
                }
            };
        }
    </script>
