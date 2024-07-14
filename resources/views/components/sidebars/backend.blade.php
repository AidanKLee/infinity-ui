<aside class="min-h-full p-3 pr-0 w-full max-w-[360px]">
    <div class="flex flex-col justify-between items-stretch h-full overflow-y-auto bg-white rounded-2xl shadow-lg dark:bg-black">
        @isset($slot)
            <div>
                {{ $slot }}
            </div>
        @endisset
        @isset($bottom)
            <div>
                {{ $bottom }}
            </div>
        @endisset
    </div>
</aside>