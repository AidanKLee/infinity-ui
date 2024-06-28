<header id="page-header" class="bg-gradient-to-r from-dark/2.5 to-dark/5 dark:from-light/2.5 dark:to-light/5">
    <div class="container flex items-stretch gap-2">
        @isset($left)
            <div class="flex items-stretch flex-1">
                {{ $left }}
            </div>
        @endisset
        @isset($middle)
            <div class="flex items-stretch justify-center flex-1">
                {{$middle}}
            </div>
        @endisset
        @isset($right)
            <div class="flex-1 flex items-stretch justify-end">
                {{$right}}
            </div>
        @endisset
    </div>
    @isset($slot)
        {{ $slot }}
    @endisset
</header>