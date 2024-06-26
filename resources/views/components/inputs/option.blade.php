<button @attributes(null, ['type'], [
    'select-option'
]) type="button">
    <div class="flex-1 truncate">
        @isset($slot)
            {{ $slot }}
        @endisset
    </div>
    <div>
        <x-icons.check class="w-5 h-5 text-primary dark:text-primary-dark" />
    </div>
</button>