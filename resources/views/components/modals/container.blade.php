@push('modals')
    <div @attributes(['x-show', 'x-data', '@keydown.window.esc'], ['overlay'], [
        'overlay',
        'overlay-clear' => isset($noOverlay) && $noOverlay === true,
    ])
        x-transition:enter="ease-out duration-200"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100 "
        x-transition:leave="ease-in duration-200"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        style="display:none;">
        <div @attributes(['x-show', '@click.outside'], null, [
            'modal',
            'modal-xs' => isset($size) && $size === 'xs',
            'modal-sm' => isset($size) && $size === 'sm',
            'modal-md' => isset($size) && $size === 'md',
            'modal-lg' => isset($size) && $size === 'lg',
            'modal-xl' => isset($size) && $size === 'xl',
            'modal-2xl' => isset($size) && $size === '2xl',
            'modal-3xl' => isset($size) && $size === '3xl',
        ])
            x-transition:enter="ease-out duration-200"
            x-transition:enter-start="-translate-y-24 blur-sm scale-50"
            x-transition:enter-end="translate-y-0 blur-nonescale-100"
            x-transition:leave="ease-in duration-200"
            x-transition:leave-start="translate-y-0 blur-none scaled-100"
            x-transition:leave-end="-translate-y-24 blur-sm scale-50">
            @if(isset($toolbar) || $attributes->has('@click.close'))
                <div @class([
                    'flex items-center gap-2',
                    'justify-between' => $attributes->has('@click.close') && (isset($toolbar) && $toolbar !== 1),
                    'justify-end' => $attributes->has('@click.close') && (!isset($toolbar) || $toolbar === 1),
                    'justify-start' => !$attributes->has('@click.close'),
                    'absolute top-0 right-0' => isset($closeButton) && $closeButton === 'absolute'
                ])>
                    {{ isset($toolbar) && $toolbar !== 1 ? $toolbar : '' }}
                    @if ($attributes->has('@click.close'))
                        <button class="focus-none group relative flex items-center cursor-pointer" @attributes(['@click.close' => '@click'])>
                            <span class="text-2xs bg-dark/10 px-1 rounded-md duration-200 group-hover:bg-primary group-hover:text-white group-focus:bg-primary group-focus:text-white dark:bg-light/10 dark:group-focus:text-black dark:group-hover:bg-primary-dark dark:group-hover:text-black dark:group-focus:bg-primary-dark">esc</span>
                            <div class="peer p-2.5 duration-200 group-hover:text-primary group-focus:text-primary dark:group-hover:text-primary-dark dark:group-focus:text-primary-dark">
                                <x-icons.cross class="w-6 h-6" />
                                <span class="sr-only">Close modal</span>
                            </div>
                        </button>
                    @endif
                </div>
            @endisset
            @isset($header)
                {{ $header }}
            @endisset
            @isset ($slot)
                {{ $slot }}
            @endif
            @isset($footer)
                {{ $footer}}
            @endisset
        </div>
    </div>
@endpush

@push('scripts')
    @once
        <script>
            (function() {
                document.addEventListener('alpine:init', () => {
                    Alpine.store('modals', {
                        show: [],
    
                        open(id, isModalOverlay = false) {
                            if (isModalOverlay) {
                                if (!this.show.includes(id)) {
                                    this.show.push(id)
                                }
                            } else {
                                if (!this.show.includes(id)) {
                                    this.show = [id]
                                }
                            }
                        },
    
                        close(id = null) {
                            if (typeof id === 'array') {
                                this.show = this.show.filter((modal) => !id.includes(modal))
                            } else if (typeof id === 'string') {
                                this.show = this.show.filter((modal) => modal !== id)
                            } else {
                                this.show = []
                            }
                        },
    
                        toggle(id, isModalOverlay = false) {
                            if (this.show === id) {
                                this.close(id)
                            } else {
                                this.open(id, isModalOverlay)
                            }
                        }
                    })
                })
            })()
        </script>
    @endonce
@endpush