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
            sdasd
        </div>
    </div>
</div>
