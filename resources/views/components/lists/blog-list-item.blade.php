<li>
    @isset($src)
        <img class="aspect-video object-cover" src="{{ $src }}" alt="{{ $alt ?? '' }}" />
    @endisset
    <div class="flex grow flex-col justify-between gap-3 p-3">
        <div class="grow">
            @if (isset($prefix) || isset($category))
                <div class="flex justify-between items-center gap-3">
                    <p class="flex-1 truncate text-primary text-xs font-bold dark:text-primary-dark">
                        @isset($prefix)
                            {{ $prefix }}
                        @endisset
                    </p>
                    @isset($category)
                        <div class="badge rounded tertiary !py-0 !px-1.5">{{ $category }}</div>
                    @endisset
                </div>
            @endif
            @isset($heading)
                <h3 class="text-lg font-semibold mt-1 line-clamp-1">{{ $heading }}</h3>
            @endisset
            @isset($slot)
                <div class="mt-3 line-clamp-4 opacity-60 font-light">
                    <p>{{ $slot }}</p>
                </div>
            @endisset
        </div>
        <div class="flex justify-between items-center gap-3">
            <p class="flex-1 truncate font-light text-xs">
                @isset($date)
                    <span>{{ $date }}</span>
                @endisset
            </p>
            @isset($href)
                <a href="{{ $href }}" class="link text-sm">
                    <span>Read More</span>
                    <span class="absolute inset-0"></span>
                </a>
            @endisset
        </div>
    </div>
</li>