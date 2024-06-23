<li class="group flex gap-2 relative p-2 rounded-md duration-200 hover:bg-primary/5 hover:text-primary focus-within:bg-primary/5 focus-within:text-primary dark:hover:bg-primary-dark/20 dark:hover:text-primary-dark dark:focus-within:bg-primary-dark/20 dark:focus-within:text-primary-dark">
    @isset($icon)
        <div class="h-10 w-10 bg-dark/5 rounded-md p-2 group-hover:bg-primary/10 group-focus-within:bg-primary/10 dark:group-hover:bg-primary-dark/20 dark:group-focus-within:bg-primary-dark/20">
            {{ $icon }}
        </div>
    @endisset
    @isset($slot)
        {{ $slot }}
    @endisset
</li>