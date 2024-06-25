<x-modals.container x-data="search_dropdown" size="lg" x-show="$store.modals.show.includes('search')" @click.close="close" @click.outside="close" @keydown.window.esc="close">
    <x-slot name="toolbar">
        <div class="flex items-stretch grow">
            <button class="focus-none p-3.5 duration-200 hover:text-primary focus:text-primary dark:hover:text-primary-dark dark:focus:text-primary-dark" @click="savePageAs">
                <x-icons.save class="w-4 h-4" />
                <span class="sr-only">Save page</span>
            </button>
            <div class="grow">
                <form class="relative h-full" @attributes(['wire:submit', '@submit']) @reset="handleReset">
                    <input @attributes(['wire:model', 'wire:input', 'x-model'])
                        class="peer focus-none bg-transparent rounded-md h-full w-full py-4 px-11 placeholder:text-black/40 hover:ring-2 hover:ring-light focus:ring-2 focus:ring-primary dark:hover:ring-dark dark:focus:ring-primary-dark dark:placeholder:text-white/40"
                        @focus="handleFocus"
                        x-model="search"
                        x-ref="search-input"
                        autocomplete="off" 
                        placeholder="Search..."
                        id="search-modal" />
                    <label class="absolute inset-y-0 left-0 flex items-center p-3.5 peer-focus:text-primary dark:peer-focus:text-primary-dark" for="search-modal">
                        <x-icons.search class=" w-4 h-4" />
                        <span class="sr-only">Search</span>
                    </label>
                    <button type="reset" class="absolute inset-y-0 right-0 flex items-center justify-center p-3.5 duration-200 hover:text-primary focus:text-primary dark:hover:text-primary-dark dark:focus:text-primary-dark" x-show="search.length">
                        <x-icons.cross class="w-4 h-4" />
                        <span class="sr-only">Clear search</span>
                    </button>
                </form>
            </div>
        </div>
    </x-slot>
    <div class="search-dropdown" x-show="search.length">
        <div class="search-dropdown-item">
            <a href="#" class="focus-none">
                <span>Result #1</span>
                <span class="absolute inset-0"></span>
            </a>
            <p class="text-xs">Lorem ipsum dolor sit amet</p>
        </div>
        <div class="search-dropdown-item">
            <a href="#" class="focus-none">
                <span>Result #2</span>
                <span class="absolute inset-0"></span>
            </a>
            <p class="text-xs">Lorem ipsum dolor sit amet</p>
        </div>
    </div>
</x-modals.container>

@push('scripts')
    @once
        <script>
            (function() {
                document.addEventListener('alpine:init', () => {
                    Alpine.data('search_dropdown', () => ({
                        search: '',
    
                        close() {
                            this.$store.modals.close()
                            setTimeout(() => {
                                this.search = ''
                            }, 300);
                        },
    
                        handleFocus() {
                            this.show = true
                        },
    
                        handleReset() {
                            this.$refs['search-input'].focus()
    
                            setTimeout(() => {
                                this.$refs['search-input'].dispatchEvent(new InputEvent('input', { bubbles: true }))
                            }, 0);
                        },
    
                        open() {
                            this.show = true
                        },
    
                        async savePageAs() {
                            const response = await fetch(window.location.href);
                            const htmlContent = await response.text();
                            const blob = new Blob([htmlContent], { type: 'text/html' });
                            const link = document.createElement('a');
    
                            link.download = document.title + '.html';
                            link.href = URL.createObjectURL(blob);
                            link.click();
                            setTimeout(() => URL.revokeObjectURL(link.href), 100);
                        },
            
                        toggle() {
                            this.open = ! this.open
                        }
                    }))
                })
            })()
        </script>
    @endonce
@endpush