<nav class="bg-white border-gray-200 px-2 sm:px-4 py-2.5">
    <div class="container flex flex-wrap items-center justify-between mx-auto">
        <a href="{{ route('home') }}" class="flex items-center">
            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/0/01/Logo_Kasir_Pintar.png/799px-Logo_Kasir_Pintar.png" class="h-6 mr-3 sm:h-9" alt="Nawa Pay" />
        </a>
        <div class="flex items-center">
            <div class="block w-auto mt-2">
                <button class="inline-flex relative peer">
                    <i class="far fa-bell text-xl"></i>
                    <div
                        class="inline-flex absolute -top-3 -right-4 justify-center items-center w-6 h-4 text-xs font-semibold text-white bg-red-500 rounded-full">
                        <span id="notification_count"></span>
                    </div>
                </button>
                <div
                    class='w-80 right-10 absolute top-5 z-50 after:content-[""] after:inline-block after:absolute after:top-0 after:bg-white after:w-full after:h-full after:-z-20 after:border after:rounded-lg peer-focus:top-12 peer-focus:opacity-100 peer-focus:visible transition-all duration-300 invisible opacity-0'>
                    <div class="p-3 flex justify-between">
                        <h5 class="text-lg font-bold text-gray-900">Notifications</h5>
                        {{-- <a href="{{ route('notifications') }}" --}}
                        <a href=""
                            class="text-gray-900 hover:text-primary-1 text-sm py-1">See
                            All</a>
                    </div>
                    <div id="notification_list"></div>
                </div>
            </div>

            {{-- <a href="{{ route('logout') }}" --}}
            <a href=""
                class="rounded bg-white border border-primary-3 ml-8 px-2 py-1 text-sm text-black font-semibold hover:bg-red-500 hover:text-white"><i
                    class="fas fa-right-from-bracket mr-1"></i>Logout</a>
        </div>
    </div>
</nav>
