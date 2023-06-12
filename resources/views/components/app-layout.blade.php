<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Styles -->
        <style>
        </style>

        @vite(['resources/css/app.css'])

        @livewireStyles

        {{-- Scripts --}}

        <!-- Alpine Plugins -->
        <script defer src="https://cdn.jsdelivr.net/npm/@alpinejs/persist@3.x.x/dist/cdn.min.js"></script>

        <!-- Alpine Core -->
        <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    </head>
    <body class="">
        <div class="flex flex-col justify-start items-center">
            {{$slot}}
        </div>



        @vite(['resources/js/app.js'])

        {{-- Scripts --}}

        <script>
            document.addEventListener("DOMContentLoaded", function() {
                window.Echo.channel('books')
                    .listen('BooksFetchedEvent', (e) => {
                        console.log('event broadcasted successfully');
                    });
            });
        </script>


        {{--
        <script>
            window.onload=function () {
                Echo.channel('books')
                    .listen('BooksFetchedEvent', (e) => {
                        console.log('event broadcasted successfully');
                    });
            }
        </script>
        --}}

        @livewireScripts

        {{-- don't show livewire errors on production --}}

        {{--
        @production
            <script>
                Livewire.onError(function (message, response) {
                    return false;
                });
            </script>
        @endproduction
        --}}

    </body>
</html>
