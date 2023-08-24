<aside class="w-96" aria-label="Sidebar" wire:ignore>
    <div class="overflow-y-auto py-4 px-3 bg-gray-50 rounded-lg h-[480px]">
        <p class="text-base font-normal text-gray-600 mb-4 pl-3">Welcome back user</p>

        <ul class="mb-1">
            <li>
                {{-- <a href="{{ route('home') }}" id="menu-1" --}}
                <a href="" id="menu-1"
                    class="flex items-center px-3 py-4 text-base font-normal rounded-lg text-gray-500 hover:bg-orange-500 hover:text-white">
                    <i class="fas fa-house-user transition duration-75 text-lg"></i>
                    <span class="ml-3">Home</span>
                </a>
            </li>
        </ul>
        <ul class="mb-1">
            <li>
                {{-- <a href="{{ route('purchase-list') }}" id="menu-2" --}}
                <a href="" id="menu-2"
                    class="flex items-center px-3 py-4 text-base font-normal rounded-lg text-gray-500 hover:bg-orange-500 hover:text-white">
                    <i class="pl-1 fas fa-file-invoice text-lg"></i>
                    <span class="ml-4">Purchase</span>
                </a>
            </li>
        </ul>
        <ul class="mb-1">
            <li>
                {{-- <a href="{{ route('payment-list') }}" id="menu-3" --}}
                <a href="" id="menu-3"
                    class="flex items-center px-3 py-4 text-base font-normal rounded-lg text-gray-500 hover:bg-orange-500 hover:text-white">
                    <i class="fas fa-money-bills text-lg"></i>
                    <span class="ml-3">Payment</span>
                </a>
            </li>
        </ul>
        <ul class="mb-1">
            <li>
                {{-- <a href="{{ route('profile') }}" id="menu-4" --}}
                <a href="" id="menu-4"
                    class="flex items-center px-3 py-4 text-base font-normal rounded-lg text-gray-500 hover:bg-orange-500 hover:text-white">
                    <i class="pl-1 fas fa-user text-lg"></i>
                    <span class="ml-4">Profile</span>
                </a>
            </li>
        </ul>
    </div>
</aside>
