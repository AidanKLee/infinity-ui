<x-layouts.app>
    <x-layouts.frontend>
        <div class="container flex flex-col items-center justify-center h-full space-y-4 py-40">
            <x-icons.logo class="w-32 h-16 text-primary dark:text-primary-dark" />
            <h1 class="text-7xl font-bold text-center text-black/80 dark:text-white/80">401</h1>
            <p class="text-lg text-center text-black/60 dark:text-white/60">You need to log in to access this page.</p>
            <a href="{{ route('home') }}" class="link flex w-fit gap-2">
                <div class="rotate-90">
                    <x-icons.arrow-down class="w-6 h-6" />
                </div>
                <span>Go back home</span>
            </a>
        </div>
    </x-layouts.frontend>
</x-layouts.app>