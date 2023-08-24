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
                <div class="bg-white rounded-lg p-4">
                    <h2 class="text-lg font-semibold mb-2">Total Overtime</h2>
                    <p class="text-gray-600">8 hours</p>
                </div>

                <!-- Kotak 2: Jatah Cuti -->
                <div class="bg-white rounded-lg p-4">
                    <h2 class="text-lg font-semibold mb-2">Jatah Cuti</h2>
                    <p class="text-gray-600">10 days</p>
                </div>

                <!-- Kotak 3: Overtime Ditolak -->
                <div class="bg-white rounded-lg p-4">
                    <h2 class="text-lg font-semibold mb-2">Overtime Ditolak</h2>
                    <p class="text-gray-600">2 hours</p>
                </div>
            </div>
        </div>
    </div>
</div>
