<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=be-vietnam-pro:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i|lexend-deca:100,200,300,400,500,600,700,800,900|outfit:100,200,300,400,500,600,700,800,900|poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i|quicksand:300,400,500,600,700" rel="stylesheet" />

        <!-- Styles -->
        @vite(['resources/css/app.css', 'resources/sass/app.scss'])
        @livewireStyles
    </head>
    <body class="relative font-sans antialiased bg-white text-black dark:text-white dark:bg-black" x-data>
        @isset($slot)
            {{ $slot }}
        @endisset
        
        <x-notifications.container>
            <x-notifications.toast icon="success" closeable index="0">
                <x-slot name="title">Successfully saved!</x-slot>
                Anyone with a link can now view this file.
            </x-notifications.toast>
            <x-notifications.toast icon="error" closeable index="1">
                <x-slot name="title">An error occurred!</x-slot>
                Something went wrong. Please try again.
            </x-notifications.toast>
            <x-notifications.toast icon="warning" closeable index="2">
                <x-slot name="title">There was a problem!</x-slot>
                Please check your internet connection.
            </x-notifications.toast>
            <x-notifications.toast icon="success" closeable index="0">
                <x-slot name="title">Successfully saved!</x-slot>
                Anyone with a link can now view this file.
            </x-notifications.toast>
            <x-notifications.toast icon="error" closeable index="1">
                <x-slot name="title">An error occurred!</x-slot>
                Something went wrong. Please try again.
            </x-notifications.toast>
            <x-notifications.toast icon="warning" closeable index="2">
                <x-slot name="title">There was a problem!</x-slot>
                Please check your internet connection.
            </x-notifications.toast>
            <x-notifications.toast icon="success" closeable>
                <x-slot name="title">Successfully saved!</x-slot>
                Anyone with a link can now view this file.
            </x-notifications.toast>
            <x-notifications.toast icon="error" closeable>
                <x-slot name="title">An error occurred!</x-slot>
                Something went wrong. Please try again.
            </x-notifications.toast>
            <x-notifications.toast icon="warning" closeable>
                <x-slot name="title">There was a problem!</x-slot>
                Please check your internet connection.
            </x-notifications.toast>
            <x-notifications.toast icon="info">
                <x-slot name="title">Receive notifications</x-slot>
                Notifications may include alerts, sounds, and badges.
                <x-slot name="actions">
                    <button class="primary">Allow</button>
                    <button class="danger" @click="close">Don't Allow</button>
                    <a href="#"">Learn more</a>
                </x-slot>
            </x-notifications.toast>
        </x-notifications.container>

        @stack('modals')
        @stack('mobile-menu')
        @stack('notifications')
        
        @stack('scripts')
        @livewireScripts
    </body>
</html>
