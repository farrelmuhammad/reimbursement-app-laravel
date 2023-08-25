<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reimbursement App</title>
    <link rel=“stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" />
    @vite('resources/css/app.css')
    <style>
        /* Chrome, Safari, Edge, Opera */
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        /* Firefox */
        input[type=number] {
            -moz-appearance: textfield;
        }
    </style>
    @stack('additional-style')
    @livewireStyles
</head>

<body>
    {{ $slot }}
    <div x-data="{ modalOpen_3: false }" class="h-[363px] w-[560px] mt-4">
        <div x-show="modalOpen_3" class="fixed inset-0 z-50 overflow-y-auto" aria-labelledby="modal-title"
            role="dialog" aria-modal="true">
            <div class="flex items-end justify-center min-h-screen px-4 text-center md:items-center sm:block sm:p-0">
                <div x-cloak x-show="modalOpen_3" x-transition:enter="transition ease-out duration-300 transform"
                    x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                    x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                    x-transition:leave="transition ease-in duration-200 transform"
                    x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                    x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                    class="inline-block w-full max-w-xl p-8 my-20 overflow-hidden text-left transition-all transform bg-white rounded-lg shadow-xl 2xl:max-w-2xl"
                    x-on:show-agreement-popup.window="modalOpen_3 = true">
                    <div class="flex flex-col items-center justify-center">
                        <svg width="160" height="159" viewBox="0 0 160 159" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M127.244 6.81445H28.6641L45.4726 50.8802V152.186H148.141V27.7116C148.141 15.9002 138.601 6.81445 127.244 6.81445Z"
                                fill="white" />
                            <path
                                d="M148.141 27.7116V152.186H136.33V33.6173C136.33 24.9859 129.515 18.1716 120.884 18.1716H33.2069L28.6641 6.81445H127.244C138.601 6.81445 148.141 15.9002 148.141 27.7116Z"
                                fill="#FDE5D1" />
                            <path
                                d="M148.141 156.729H45.4729C42.7472 156.729 40.93 154.911 40.93 152.186V51.7886L24.5757 8.63148C24.1215 6.81434 24.1215 5.45148 25.03 4.08863C25.9386 2.72577 27.3015 2.27148 28.6643 2.27148H127.244C141.327 2.27148 152.684 13.6286 152.684 27.7115V152.186C152.684 154.911 150.413 156.729 148.141 156.729ZM50.0157 147.643H143.599V27.7115C143.599 18.6258 136.33 11.3572 127.244 11.3572H35.4786L50.0157 49.0629C50.0157 49.5172 50.47 49.9715 50.47 50.8801V147.643H50.0157Z"
                                fill="#3D2006" />
                            <path
                                d="M28.664 6.81445C19.5783 6.81445 11.8555 14.083 11.8555 23.623V51.7887C11.8555 53.1516 13.2183 54.5145 14.5812 54.5145H42.2926C43.6555 54.5145 45.0183 53.1516 45.0183 51.7887V23.623C45.4726 14.083 38.204 6.81445 28.664 6.81445Z"
                                fill="#FDE5D1" />
                            <path
                                d="M42.2926 13.6287C40.4755 13.1745 39.1126 12.7202 37.2955 12.7202C28.2098 12.7202 20.4869 19.9887 20.4869 29.5287V54.0602H14.5812C13.2183 54.0602 11.8555 52.6973 11.8555 51.3345V23.623C11.8555 14.5373 19.124 6.81445 28.664 6.81445C34.1155 6.81445 39.1126 9.54017 42.2926 13.6287Z"
                                fill="#F9B274" />
                            <path
                                d="M42.7468 59.0572H14.5811C10.4925 59.0572 7.3125 55.8772 7.3125 51.7886V23.6229C7.3125 11.8115 16.8525 2.27148 28.6639 2.27148C40.4754 2.27148 50.0154 11.8115 50.0154 23.6229V51.7886C50.0154 55.4229 46.8354 59.0572 42.7468 59.0572ZM16.3982 49.9715H40.9296V23.6229C40.9296 16.8086 35.4782 11.3572 28.6639 11.3572C21.8496 11.3572 16.3982 16.8086 16.3982 23.6229V49.9715Z"
                                fill="#3D2006" />
                            <path
                                d="M121.336 128.563H66.8222C65.4594 128.563 64.5508 127.655 64.5508 126.292C64.5508 124.929 65.4594 124.021 66.8222 124.021H121.336C122.699 124.021 123.608 124.929 123.608 126.292C123.608 127.655 122.245 128.563 121.336 128.563Z"
                                fill="#FDE5D1" />
                            <path
                                d="M121.336 101.306H66.8222C65.4594 101.306 64.5508 100.397 64.5508 99.0341C64.5508 97.6713 65.4594 96.7627 66.8222 96.7627H121.336C122.699 96.7627 123.608 97.6713 123.608 99.0341C123.608 100.397 122.245 101.306 121.336 101.306Z"
                                fill="#FDE5D1" />
                            <path
                                d="M121.336 74.0487H66.8222C65.4594 74.0487 64.5508 73.1401 64.5508 71.7773C64.5508 70.4144 65.4594 69.5059 66.8222 69.5059H121.336C122.699 69.5059 123.608 70.4144 123.608 71.7773C123.608 72.6859 122.245 74.0487 121.336 74.0487Z"
                                fill="#FDE5D1" />
                            <path
                                d="M121.336 46.3368H66.8222C65.4594 46.3368 64.5508 45.4282 64.5508 44.0654C64.5508 42.7025 65.4594 41.7939 66.8222 41.7939H121.336C122.699 41.7939 123.608 42.7025 123.608 44.0654C123.608 45.4282 122.245 46.3368 121.336 46.3368Z"
                                fill="#FDE5D1" />
                            <path
                                d="M45.9263 137.648C61.2309 137.648 73.6377 125.242 73.6377 109.937C73.6377 94.6324 61.2309 82.2256 45.9263 82.2256C30.6217 82.2256 18.2148 94.6324 18.2148 109.937C18.2148 125.242 30.6217 137.648 45.9263 137.648Z"
                                fill="#F9B274" />
                            <path
                                d="M69.0937 94.4913C64.5508 91.3113 59.0994 89.4942 53.648 89.4942C38.6565 89.4942 25.9365 101.76 25.9365 117.206C25.9365 123.111 27.7537 128.108 30.4794 132.651C23.2108 127.654 18.668 119.477 18.668 109.937C18.668 94.9456 30.9337 82.2256 46.3794 82.2256C55.4651 82.2256 64.0965 87.2227 69.0937 94.4913Z"
                                fill="#F57F17" />
                            <path
                                d="M45.9262 141.737C28.209 141.737 13.6719 127.2 13.6719 109.483C13.6719 91.7657 28.209 77.2285 45.9262 77.2285C63.6433 77.2285 78.1805 91.7657 78.1805 109.483C78.1805 127.2 63.6433 141.737 45.9262 141.737ZM45.9262 86.7685C33.2062 86.7685 22.7576 97.2171 22.7576 109.937C22.7576 122.657 33.2062 133.106 45.9262 133.106C58.6462 133.106 69.0947 122.657 69.0947 109.937C69.0947 97.2171 58.6462 86.7685 45.9262 86.7685Z"
                                fill="#3D2006" />
                            <path
                                d="M45.473 124.02C43.6559 123.566 42.293 122.657 41.8387 121.294L35.933 105.849C35.0245 103.577 36.3873 100.852 38.6587 99.943C40.9302 99.0345 43.6559 100.397 44.5645 102.669L47.7445 110.846L67.733 85.8602C69.0959 84.043 72.2759 83.5887 74.093 84.9516C75.9102 86.3145 76.3645 89.4945 75.0016 91.3116L50.0159 122.657C48.653 123.566 46.8359 124.02 45.473 124.02Z"
                                fill="#3D2006" />
                        </svg>

                        <h2 class="mt-4 text-2xl font-bold text-gray-900">Registration successfully</h2>
                        <p class="mt-2 text-gray-600">Congratulations, you can already enjoy all the
                            benefits in Kasir Pintar</p>
                        {{-- <a @click="modalOpen_3 = false"
                            class="bg-primary-1 text-white active:bg-primary-3 text-sm font-bold px-6 py-3 rounded-lg shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 mt-5 w-full ease-linear transition-all duration-150 text-center cursor-pointer"
                            type="button">
                            Back
                        </a> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

    <script>
        document.addEventListener('livewire:load', () => {
            Livewire.on('alert', data => {
                console.log(data)
                openModal(data.type, data.message);
            });
        });

        function openModal(type, message) {
            const modal = document.querySelector('[x-data="{ modalOpen_3: false }"]');
            if (modal) {
                console.log(modal)
                modal.__x.$data.modalOpen_3 = true;
            }
        }
    </script>
    @stack('additional-script')
    @livewireScripts
</body>

</html>
