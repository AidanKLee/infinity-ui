<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=be-vietnam-pro:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i|lexend-deca:100,200,300,400,500,600,700,800,900|outfit:100,200,300,400,500,600,700,800,900|poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i|quicksand:300,400,500,600,700" rel="stylesheet" />

        <!-- Styles -->
        @vite(['resources/css/app.css', 'resources/sass/app.scss'])
        @livewireStyles
    </head>
    <body class="font-sans antialiased bg-white-pure text-black dark:text-white dark:bg-black-pure">
        @isset($slot)
            {{ $slot }}
        @endisset
        
        @stack('modals')
        @stack('scripts')
        @livewireScripts
    </body>
</html>