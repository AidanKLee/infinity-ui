<li class="flex items-center justify-center" @attributes(null, ['name', 'list'])>
    @if (isset($slide) && isset($name) && isset($list))
        <button 
            class="focus-none h-full w-full duration-200 opacity-30 grayscale hover:opacity-100 hover:grayscale-0 focus:opacity-100 focus:grayscale-0" 
            :class="{ 
                '!opacity-100 !grayscale-0': show === '{{ $name }}',
            }"
            data-slide="{{ $name }}" @click="toggle">
            @isset($slot)
                {{ $slot }}
            @endisset
        </button>
    @else
    <div 
        class="focus-none h-full w-full duration-200 opacity-30 grayscale hover:opacity-100 hover:grayscale-0 focus:opacity-100 focus:grayscale-0" 
    >
        @isset($slot)
            {{ $slot }}
        @endisset
    </div>
    @endif
    @if (isset($slide) && isset($name) && isset($list))
        @push("$list-logo-list")
            <div class="relative text-sm space-y-2" x-show="show === '{{ $name }}'">
                {{ $slide }}
            </div>
        @endpush
    @endisset
</li>