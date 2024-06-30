@push('mobile-menu')
    @once
        <div @attributes(['class', 'x-show', 'x-data', '@keydown.window.esc'], ['overlay'], [
            'overlay mobile-menu-overlay p-0 pl-0 xl:hidden 2xs:pl-8',
            'overlay-clear' => isset($noOverlay) && $noOverlay === true,
        ])
            x-transition:enter="ease-out duration-200"
            x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100"
            x-transition:leave="ease-in duration-200"
            x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0"
            style="display: none;"
            @resize.window="$store.mobilemenu.handleWindowResize()"
            >
            <aside @attributes(['x-show', '@click.outside'], null, [
                'mobile-menu',
            ]) 
                x-transition:enter="ease-out duration-200"
                x-transition:enter-start="translate-x-full"
                x-transition:enter-end="translate-x-0"
                x-transition:leave="ease-in duration-200"
                x-transition:leave-start="ranslate-x-0"
                x-transition:leave-end="translate-x-full"
                x-data
                >
                <div class="flex">
                    @isset($preheader)
                        {{ $preheader }}
                    @endisset
                    <div class="p-2">
                        <button @attributes(['@click.close' => '@click'], null, ['navlink'])>
                            <x-icons.cross class="w-6 h-6" />
                            <span class="sr-only">Close menu</span>
                        </button>
                    </div>
                    @isset($postheader)
                        {{ $postheader }}
                    @endisset
                </div>
                @isset($slot)
                    <div class="flex-1 overflow-auto">{{ $slot }}</div>
                @endisset
            </aside>
        </div>
    @endonce
@endpush

@push('scripts')
    @once
        <script>
            (function() {
                document.addEventListener('alpine:init', () => {
                    Alpine.store('mobilemenu', {
                        show: false,
                        disableClose: false,

                        handleWindowResize() {
                            if (window.innerWidth >= 1280 && this.show) {
                                this.close()
                            }
                        },
    
                        open() {
                            this.show = true
                            document.body.style.overflow = 'hidden'
                        },
    
                        close(override = false) {
                            if (!this.disableClose || override) {
                                this.disableClose = false
                                this.show = false
                                document.body.style.overflow = ''
                            }
                        },
    
                        toggle() {
                            if (this.show) {
                                this.close()
                            } else {
                                this.open()
                            }
                        }
                    })
                })
            })()
        </script>
    @endonce
@endpush