<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Optimus | @yield('title')</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/script.js') }}"></script>
</head>
<body">
    <div class="App h-full">

        @include('layouts.navigation')


        <div class="max-w-7xl mx-auto pt-20 p-8  h-full ">
            @if (session()->get('info'))
                <div class="popup shadow-xl bg-slate-200 text-black">
                    {{ session()->get('info') }}
                </div>
            @endif


            @yield('content')
        </div>



    </div>


    </body>

</html>
