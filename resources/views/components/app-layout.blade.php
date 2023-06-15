<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        {{-- Fonts --}}

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        {{-- Vite bundled CSS and JS--}}

        @vite(['resources/css/app.css', 'resources/js/app.js'])


        <!-- Styles -->

        <style>
        </style>

        @livewireStyles

        {{-- Scripts --}}


    </head>
    <body class="">
        <div class="flex flex-col justify-start items-center">
            {{$slot}}
        </div>


        {{-- 3rd Party Components --}}

        <x-toaster-hub />

        {{-- Scripts --}}

        @livewireScripts

        {{-- don't show livewire errors on production --}}

        @production
            <script>
                Livewire.onError(function (message, response) {
                    return false;
                });
            </script>
        @endproduction

    </body>
</html>
