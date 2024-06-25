<div @attributes(null, null, [
    'navlink-dropdown',
    '-left-3' => !isset($position) || $position === 'left',
    '-right-3' => isset($position) && $position === 'right',
    'left-1/2 -translate-x-1/2' => isset($position) && $position === 'center',
    ])
    style="display: none;"
    x-transition:enter="ease-out duration-300"
    x-transition:enter-start="opacity-0 scale-90"
    x-transition:enter-end="opacity-100 scale-100"
    x-transition:leave="ease-in duration-300"
    x-transition:leave-start="opacity-100 scale-100"
    x-transition:leave-end="opacity-0 scale-90">
    @isset($slot)
        {{ $slot }}
    @endisset
</div>