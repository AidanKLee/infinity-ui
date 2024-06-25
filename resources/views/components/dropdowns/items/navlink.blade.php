<li @attributes(null, null, "navlink-dropdown-item group")>
    @isset($icon)
        <div class="h-10 w-10 bg-dark/5 rounded-md p-2 group-hover:bg-primary/10 group-focus-within:bg-primary/10 dark:group-hover:bg-primary-dark/20 dark:group-focus-within:bg-primary-dark/20">
            {{ $icon }}
        </div>
    @endisset
    @isset($slot)
        {{ $slot }}
    @endisset
</li>