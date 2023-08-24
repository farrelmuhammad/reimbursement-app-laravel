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
            <div class="grid grid-cols-3 gap-6 space-x-6">
                <!-- Kotak 1: Total Overtime -->
                <div class="bg-white rounded-lg p-6 text-center">
                    <h2 class="text-lg font-semibold mb-2">
                        <span class="text-blue-500">Total Overtime</span>
                    </h2>
                    <p class="text-2xl font-bold">
                        <span class="text-blue-700">8 hours</span>
                    </p>
                </div>

                <!-- Kotak 2: Jatah Cuti -->
                <div class="bg-white rounded-lg p-6 text-center">
                    <h2 class="text-lg font-semibold mb-2">
                        <span class="text-green-500">Jatah Cuti</span>
                    </h2>
                    <p class="text-2xl font-bold">
                        <span class="text-green-700">10 days</span>
                    </p>
                </div>

                <!-- Kotak 3: Overtime Ditolak -->
                <div class="bg-white rounded-lg p-6 text-center">
                    <h2 class="text-lg font-semibold mb-2">
                        <span class="text-red-500">Overtime Ditolak</span>
                    </h2>
                    <p class="text-2xl font-bold">
                        <span class="text-red-700">2 hours</span>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>


