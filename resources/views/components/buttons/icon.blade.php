<button @attributes(null, ['name'], 'btn-icon')>
    @isset($slot)
        {{ $slot }}
    @endisset
    @isset($name)
        <span class="sr-only">{{ $name }}</span>
    @endisset
</button>