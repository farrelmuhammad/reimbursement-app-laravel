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
                    <table class="table table-bordered" id="tableExample">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                            </tr>
                        </thead>
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

                const table = $('#tableExample').DataTable(); // Initialize DataTables

                for (let i = 0; i < 10; i++) {
                    const randomName = names[Math.floor(Math.random() * names.length)];
                    const randomEmail = emails[Math.floor(Math.random() * emails.length)];

                    table.row.add([randomName, randomEmail]).draw(); // Add row and redraw table
                }
            }
        };
    }
</script>

<script>
    $(document).ready(function() {
        $('#tableExample').DataTable({
            paging: true, // Enable pagination
            lengthMenu: [5, 10, 25, 50], // Show options for number of entries per page
            pageLength: 5, // Default number of entries per page
        });
    });
</script>
