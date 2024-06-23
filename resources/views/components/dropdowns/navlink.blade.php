<div @attributes(null, null, 'absolute z-10 w-96 border border-dark/5 -left-3 -bottom-1 rounded-xl translate-y-full bg-white shadow-xl dark:bg-black dark:border-light/10')
    x-transition:enter="ease-out duration-300"
    x-transition:enter-start="opacity-0 scale-90"
    x-transition:enter-end="opacity-100 scale-100"
    x-transition:leave="ease-in duration-300"
    x-transition:leave-start="opacity-100 scale-100"
    x-transition:leave-end="opacity-0 scale-90">
    <ul class="flex flex-col gap-1 p-3">
        @isset($slot)
            {{ $slot }}
        @endisset
    </ul>
</div>