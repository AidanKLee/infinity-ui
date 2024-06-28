<label class="select-option">
    <input type="radio" class="sr-only" />
    <div class="flex-1 truncate">
        @isset($slot)
                {{ $slot }}
        @endisset
    </div>
    <div x-show="selectedValue.includes({{ $value ? e($value) : -1 }})" style="display: none;">
        <x-icons.check class="w-5 h-5 text-primary dark:text-primary-dark" />
    </div>
</label>