<aside class="w-96" aria-label="Sidebar" wire:ignore>
    <div class="overflow-y-auto py-4 px-3 bg-gray-50 rounded-lg h-[480px]">
        <div class="flex items-center my-6">
            <img src=""
                class="h-12 w-12 rounded-full mr-3" alt="User Profile" />
            <span class="text-base font-semibold text-gray-600">Welcome back, User</span>
        </div>
        
        <hr class="border-t-2 border-black mb-4">
        
        <div class="text-center">
            <p class="text-lg font-semibold">Greetings!</p>
            <p class="text-gray-500">Have a great day ahead.</p>
        </div>
        
        <hr class="border-b-2 border-black mt-4">
        
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
