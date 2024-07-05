<li x-data="accordion" @click.outside="close" @resize.window="handleResize" :class="{ 'border-primary dark:border-primary-dark': show }">
    <button class="focus-none flex items-center justify-between w-full gap-3 py-8 duration-200 focus:text-primary dark:focus:text-primary-dark" @click="toggle">
        <h3 class="text-left font-semibold flex-1 xs:text-lg xl:text-xl">
            @isset($header)
                {{ $header }}
            @endisset
        </h3>
        <div class="duration-200" :class="{ 'rotate-180': show }">
            <x-icons.chevron-down class="h-5 w-5 text-primary dark:text-primary-dark" />
        </div>
    </button>
    <div class="overflow-hidden duration-200" x-ref="content" style="height:0;">
        <p class="text-sm font-light pb-8 xs:text-base">
            @isset($slot)
                {{ $slot }}
            @endisset
        </p>
    </div>
</li>

@push('scripts')
    @once
        <script>
            (function() {
                document.addEventListener('alpine:init', () => {
                    Alpine.data('accordion', () => ({
                        show: false,
    
                        close() {
                            this.show = false
                            this.$refs.content.style.height = 0
                        },

                        handleResize() {
                            if (this.show) {
                                this.$refs.content.style.transition = 'none'

                                this.$refs.content.style.height = ''
                                this.$refs.content.style.height = this.$refs.content.scrollHeight + 'px'
                                
                                this.$refs.content.style.transition = ''
                            }
                        },
    
                        open() {
                            this.show = true
                            this.$refs.content.style.height = this.$refs.content.scrollHeight + 'px'
                        },
            
                        toggle() {
                            if (this.show) {
                                this.close()
                            } else {
                                this.open()
                            }
                        }
                    }))
                })
            })()
        </script>
    @endonce
@endpush