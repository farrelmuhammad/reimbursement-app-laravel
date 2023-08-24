<div class="min-w-screen min-h-screen bg-gray-200 flex items-center justify-center">
    <div class="bg-white text-gray-800 shadow-lg overflow-hidden relative flex h-[566px] w-[514px] rounded-lg">
        <div class="bg-white h-full w-full pt-4 pb-20 overflow-y-auto">
            <div class="flex justify-between mb-5 pb-3 shadow-lg px-6">
                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/0/01/Logo_Kasir_Pintar.png/799px-Logo_Kasir_Pintar.png"
                    alt="Kasir Pintar" class="w-28 h-8">
                <a href="" class="text-slate-500 hover:text-primary-1 active:text-primary-3 mt-1">
                    {{-- <span class="text-xs font-light">Need Help?</span> --}}
                </a>
            </div>
            <div class="px-6 mt-12 mb-6 text-center">
                <span class="text-xl font-light text-slate-500">Register to Reimbursement App</span>
            </div>
            <div class="relative mx-6 mt-8">
                <input type="number" wire:model="nip"
                    class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-slate-900 bg-slate-100 rounded-lg appearance-none border-2 focus:outline-none focus:ring-0 focus:border-primary-3 peer"
                    placeholder=" " />
                <label for="floating_outlined"
                    class="absolute text-sm text-slate-500 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] rounded px-2 font-bold bg-white border-2 border-slate-100 peer-focus:px-2 peer-focus:text-slate-500 peer-placeholder-shown:bg-slate-100 peer-placeholder-shown:font-normal peer-placeholder-shown:scale-90 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:font-bold peer-focus:bg-white peer-focus:-translate-y-4 left-1">NIP<span
                        class="text-red-500 ml-1">*</span></label>
            </div>
            <div class="mx-6 mb-3">
                @error('nip')
                    <span class="error text-xs text-red-500 font-light">{{ $message }}</span>
                @enderror
            </div>
            <div class="relative mx-6">
                <input type="number" wire:model="nama"
                    class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-slate-900 bg-slate-100 rounded-lg appearance-none border-2 focus:outline-none focus:ring-0 focus:border-primary-3 peer"
                    placeholder=" " />
                <label for="floating_outlined"
                    class="absolute text-sm text-slate-500 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] rounded px-2 font-bold bg-white border-2 border-slate-100 peer-focus:px-2 peer-focus:text-slate-500 peer-placeholder-shown:bg-slate-100 peer-placeholder-shown:font-normal peer-placeholder-shown:scale-90 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:font-bold peer-focus:bg-white peer-focus:-translate-y-4 left-1">Nama
                    Karyawan<span class="text-red-500 ml-1">*</span></label>
            </div>
            <div class="mx-6 mb-3">
                @error('nama')
                    <span class="error text-xs text-red-500 font-light">{{ $message }}</span>
                @enderror
            </div>
            <div class="relative mx-6">
                <select wire:model="jabatan"
                    class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-slate-900 bg-slate-100 rounded-lg appearance-none border-2 focus:outline-none focus:ring-0 focus:border-primary-3 peer">
                    <option value="" disabled selected>Select Jabatan</option>
                    <option value="Staff">Staff</option>
                    <option value="Finance">Finance</option>
                    <option value="Direktur">Direktur</option>
                </select>
                <label for="floating_outlined"
                    class="absolute text-sm text-slate-500 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] rounded px-2 font-bold bg-white border-2 border-slate-100 peer-focus:px-2 peer-focus:text-slate-500 peer-placeholder-shown:bg-slate-100 peer-placeholder-shown:font-normal peer-placeholder-shown:scale-90 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:font-bold peer-focus:bg-white peer-focus:-translate-y-4 left-1">Jabatan<span
                        class="text-red-500 ml-1">*</span></label>
            </div>

            <div class="mx-6 mb-3">
                @error('jabatan')
                    <span class="error text-xs text-red-500 font-light">{{ $message }}</span>
                @enderror
            </div>
            <div class="relative mx-6" x-data="{ show: true }">
                <input :type="show ? 'password' : 'text'" wire:model="password"
                    class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-slate-900 bg-slate-100 rounded-lg appearance-none border-2 focus:outline-none focus:ring-0 focus:border-primary-3 peer"
                    placeholder=" " />
                <div class="absolute top-0 right-0 mt-4 mr-4 text-gray-400">
                    <svg class="h-4 text-gray-500 hover:text-primary-3" fill="none" @click="show = !show"
                        :class="{ 'hidden': !show, 'block': show }" xmlns="http://www.w3.org/2000/svg"
                        viewbox="0 0 576 512">
                        <path fill="currentColor"
                            d="M572.52 241.4C518.29 135.59 410.93 64 288 64S57.68 135.64 3.48 241.41a32.35 32.35 0 0 0 0 29.19C57.71 376.41 165.07 448 288 448s230.32-71.64 284.52-177.41a32.35 32.35 0 0 0 0-29.19zM288 400a144 144 0 1 1 144-144 143.93 143.93 0 0 1-144 144zm0-240a95.31 95.31 0 0 0-25.31 3.79 47.85 47.85 0 0 1-66.9 66.9A95.78 95.78 0 1 0 288 160z">
                        </path>
                    </svg>

                    <svg class="h-4 text-gray-500 hover:text-primary-3" fill="none" @click="show = !show"
                        :class="{ 'block': !show, 'hidden': show }" xmlns="http://www.w3.org/2000/svg"
                        viewbox="0 0 640 512">
                        <path fill="currentColor"
                            d="M320 400c-75.85 0-137.25-58.71-142.9-133.11L72.2 185.82c-13.79 17.3-26.48 35.59-36.72 55.59a32.35 32.35 0 0 0 0 29.19C89.71 376.41 197.07 448 320 448c26.91 0 52.87-4 77.89-10.46L346 397.39a144.13 144.13 0 0 1-26 2.61zm313.82 58.1l-110.55-85.44a331.25 331.25 0 0 0 81.25-102.07 32.35 32.35 0 0 0 0-29.19C550.29 135.59 442.93 64 320 64a308.15 308.15 0 0 0-147.32 37.7L45.46 3.37A16 16 0 0 0 23 6.18L3.37 31.45A16 16 0 0 0 6.18 53.9l588.36 454.73a16 16 0 0 0 22.46-2.81l19.64-25.27a16 16 0 0 0-2.82-22.45zm-183.72-142l-39.3-30.38A94.75 94.75 0 0 0 416 256a94.76 94.76 0 0 0-121.31-92.21A47.65 47.65 0 0 1 304 192a46.64 46.64 0 0 1-1.54 10l-73.61-56.89A142.31 142.31 0 0 1 320 112a143.92 143.92 0 0 1 144 144c0 21.63-5.29 41.79-13.9 60.11z">
                        </path>
                    </svg>
                </div>
                <label for="floating_outlined"
                    class="absolute text-sm text-slate-500 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] rounded px-2 font-bold bg-white border-2 border-slate-100 peer-focus:px-2 peer-focus:text-slate-500 peer-placeholder-shown:bg-slate-100 peer-placeholder-shown:font-normal peer-placeholder-shown:scale-90 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:font-bold peer-focus:bg-white peer-focus:-translate-y-4 left-1">Password<span
                        class="text-red-500 ml-1">*</span></label>
            </div>
            <div class="mx-6 mb-3">
                @error('password')
                    <span class="error text-xs text-red-500 font-light">{{ $message }}</span>
                @enderror
            </div>
            <div class="relative mx-6" x-data="{ show: true }">
                <input :type="show ? 'confirm_password' : 'text'" wire:model="confirm_password"
                    class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-slate-900 bg-slate-100 rounded-lg appearance-none border-2 focus:outline-none focus:ring-0 focus:border-primary-3 peer"
                    placeholder=" " />
                <div class="absolute top-0 right-0 mt-4 mr-4 text-gray-400">
                    <svg class="h-4 text-gray-500 hover:text-primary-3" fill="none" @click="show = !show"
                        :class="{ 'hidden': !show, 'block': show }" xmlns="http://www.w3.org/2000/svg"
                        viewbox="0 0 576 512">
                        <path fill="currentColor"
                            d="M572.52 241.4C518.29 135.59 410.93 64 288 64S57.68 135.64 3.48 241.41a32.35 32.35 0 0 0 0 29.19C57.71 376.41 165.07 448 288 448s230.32-71.64 284.52-177.41a32.35 32.35 0 0 0 0-29.19zM288 400a144 144 0 1 1 144-144 143.93 143.93 0 0 1-144 144zm0-240a95.31 95.31 0 0 0-25.31 3.79 47.85 47.85 0 0 1-66.9 66.9A95.78 95.78 0 1 0 288 160z">
                        </path>
                    </svg>

                    <svg class="h-4 text-gray-500 hover:text-primary-3" fill="none" @click="show = !show"
                        :class="{ 'block': !show, 'hidden': show }" xmlns="http://www.w3.org/2000/svg"
                        viewbox="0 0 640 512">
                        <path fill="currentColor"
                            d="M320 400c-75.85 0-137.25-58.71-142.9-133.11L72.2 185.82c-13.79 17.3-26.48 35.59-36.72 55.59a32.35 32.35 0 0 0 0 29.19C89.71 376.41 197.07 448 320 448c26.91 0 52.87-4 77.89-10.46L346 397.39a144.13 144.13 0 0 1-26 2.61zm313.82 58.1l-110.55-85.44a331.25 331.25 0 0 0 81.25-102.07 32.35 32.35 0 0 0 0-29.19C550.29 135.59 442.93 64 320 64a308.15 308.15 0 0 0-147.32 37.7L45.46 3.37A16 16 0 0 0 23 6.18L3.37 31.45A16 16 0 0 0 6.18 53.9l588.36 454.73a16 16 0 0 0 22.46-2.81l19.64-25.27a16 16 0 0 0-2.82-22.45zm-183.72-142l-39.3-30.38A94.75 94.75 0 0 0 416 256a94.76 94.76 0 0 0-121.31-92.21A47.65 47.65 0 0 1 304 192a46.64 46.64 0 0 1-1.54 10l-73.61-56.89A142.31 142.31 0 0 1 320 112a143.92 143.92 0 0 1 144 144c0 21.63-5.29 41.79-13.9 60.11z">
                        </path>
                    </svg>
                </div>
                <label for="floating_outlined"
                    class="absolute text-sm text-slate-500 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] rounded px-2 font-bold bg-white border-2 border-slate-100 peer-focus:px-2 peer-focus:text-slate-500 peer-placeholder-shown:bg-slate-100 peer-placeholder-shown:font-normal peer-placeholder-shown:scale-90 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:font-bold peer-focus:bg-white peer-focus:-translate-y-4 left-1">Confirm
                    Password<span class="text-red-500 ml-1">*</span></label>
            </div>
            <div class="mx-6 mb-3">
                @error('confirm_password')
                    <span class="error text-xs text-red-500 font-light">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="bg-white absolute bottom-0 w-full mb-0">
            <div class="flex flex-grow items-center justify-center px-6 py-2" x-data="">
                <button onclick="register()"
                    class="bg-orange-500 text-white active:bg-red-3 text-sm font-bold px-6 py-3 rounded-lg shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 w-full ease-linear transition-all duration-150 text-center"
                    type="button"> Register </button>
            </div>
            <div class="flex flex-grow items-center justify-center px-6 py-2" x-data="">
                <a href="{{ route('login') }}"
                    class="text-sm font-light text-slate-500 hover:text-primary-1 active:text-primary-3">Already have
                    an account? Login</a>
            </div>
        </div>

    </div>
</div>
@push('additional-script')
    <script>
        function register() {
            Livewire.emit("register");
        }
    </script>
@endpush
