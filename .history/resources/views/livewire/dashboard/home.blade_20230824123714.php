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

                <div class="bg-gray-200">
                    asdasd
                </div>
            </div>
        </div>
    </div>
</div>

