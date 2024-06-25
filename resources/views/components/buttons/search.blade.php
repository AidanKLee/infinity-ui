<button x-data="search" @attributes(null, ['x-data', '@keydown.window', '@click'], "btn-search") @keydown.window="handleKeydown" @click="$store.modals.open('search')">
    <div class="flex items-center gap-2 text-sm font-light">
        <x-icons.search class="w-4 h-4" />
        <span>Search...</span>
    </div>
    <span class="text-xs"><span x-text="key">⌘</span>+S</span>
</button>

@push('scripts')
    @once
        <script>
            document.addEventListener('alpine:init', () => {
                Alpine.data('search', () => ({
                    os: navigator.platform.includes('Mac') ? 'mac' : 'windows',
                    key: navigator.platform.includes('Mac') ? '⌘' : 'Ctrl',

                    handleKeydown(e) {
                        if (e.key === 's' && (this.os === 'mac' ? e.metaKey : e.ctrlKey)) {
                            e.preventDefault();
                            this.$store.modals.open('search')
                        }
                    },
        
                    toggle() {
                        this.open = ! this.open
                    }
                }))
            })
        </script>
    @endonce
@endpush