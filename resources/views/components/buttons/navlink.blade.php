@isset($dropdown)
    <div @class(['flex items-stretch', 'relative' => !isset($isFullWidth) || !$isFullWidth]) x-data="dropdown" @click.outside="close">
        <button @attributes(null, ['@click', '@keydown.window.esc'], 'navlink') :class="{ 'bg-primary/5 text-primary dark:bg-primary-dark/20 dark:text-primary-dark': open }" @click="toggle" @keydown.window.esc="close">
            @isset($slot)
                {{ $slot }}
            @endisset
            <div class="duration-200 transition-transform" :class="{ 'rotate-180': open }">
                <x-icons.chevron-down class="w-3 h-3" />
            </div>
        </button>
        {{ $dropdown }}
    </div>

    @push('scripts')
        @once
            <script>
                document.addEventListener('alpine:init', () => {
                    Alpine.data('dropdown', () => ({
                        open: false,

                        close() {
                            this.open = false
                        },

                        open() {
                            this.open = true
                        },
            
                        toggle() {
                            this.open = ! this.open
                        }
                    }))
                })
            </script>
        @endonce
    @endpush
@else
    @isset ($href)
        <a @attributes(null, null, 'navlink')>
            @isset($slot)
                {{ $slot }}
            @endisset
        </a>
    @else
        <button @attributes(null, null, 'navlink')>
            @isset($slot)
                {{ $slot }}
            @endisset
        </button>
    @endif
@endisset