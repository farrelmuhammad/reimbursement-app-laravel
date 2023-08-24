<aside class="w-96" aria-label="Sidebar" wire:ignore>
    <div class="overflow-y-auto py-4 px-3 bg-gray-50 rounded-lg h-[480px]">
        <div class="text-center my-4">
            <div class="flex flex-col items-center">
                <img src="https://images.unsplash.com/photo-1501196354995-cbb51c65aaea?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=871&q=80"
                    class="h-20 w-20 rounded-full object-cover mb-2" alt="User Profile" />
                <p class="text-lg font-semibold">Welcome back, User</p>
                <p class="text-gray-500">Have a great day ahead.</p>
            </div>
        </div>


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
