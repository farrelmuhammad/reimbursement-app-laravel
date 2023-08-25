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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            this.livewire.on('showModal', data => {
                openModal(data.title, data.text);
            });
        });

        function openModal(title, text) {
            // Set data dalam modal, bisa menggunakan jQuery atau JavaScript murni
            $('#modalTitle').text(title);
            $('#modalText').text(text);

            // Buka modal menggunakan JavaScript, asumsikan Anda memiliki elemen modal dengan ID 'myModal'
            $('#myModal').modal('show');
        }
    </script>
    @stack('additional-script')
    @livewireScripts
</body>

</html>
