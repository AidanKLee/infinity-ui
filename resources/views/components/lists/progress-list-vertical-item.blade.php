<li>
    <div>
        <div>
            @isset($icon)
                {{ $icon}}
            @endisset
        </div>
    </div>
    <div>
        <h3 class="text-xl font-semibold">
            @isset($heading)
                {{ $heading }}
            @endisset
        </h3>
        <p class="text-sm mt-1 opacity-60">
            @isset($slot)
                {{ $slot }}
            @endisset
        </p>
    </div>
</li>