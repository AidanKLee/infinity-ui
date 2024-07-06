<div x-data="logo_list" @resize.window="handleWindowResize">
    <ul class="grid grid-cols-2 gap-5 xs:gap-10 md:grid-cols-4 mt-8 sm:mt-20 gap-y-5 sm:gap-x-20 md:gap-10 lg:gap-20 xl:gap-24 2xl:gap-36 3xl:gap-56">
        @isset($slot)
            {{ $slot }}
        @endisset
    </ul>
    <div class="max-w-2xl overflow-hidden mx-auto duration-200" x-ref="slide" style="height: 0;">
        <div class="p-3 backdrop-blur-md shadow-md rounded-md mb-3 mx-3 mt-8 dark:bg-white/2.5">
            @stack("$name-logo-list")
        </div>
    </div>
</div>

@push('scripts')
    @once
        <script>
            (function() {
                document.addEventListener('alpine:init', () => {
                    Alpine.data('logo_list', () => ({
                        show: null,
    
                        close() {
                            this.$refs.slide.style.height = 0

                            setTimeout(() => {
                                this.show = null
                            }, 200)
                        },

                        handleWindowResize() {
                            if (this.show) {
                                this.$refs.slide.style.transition = 'none'

                                this.$refs.slide.style.height = ''
                                this.$refs.slide.style.height = this.$refs.slide.scrollHeight + 'px'

                                this.$refs.slide.style.transition = ''
                            }
                        },
    
                        open(e, newTargetName = null) {
                            if (this.show) {
                                this.close()

                                setTimeout(() => {
                                    this.show = newTargetName

                                    setTimeout(() => {
                                        this.$refs.slide.style.height = this.$refs.slide.scrollHeight + 'px'
                                    }, 40)
                                }, 200)
                            } else {
                                this.show = e.currentTarget.dataset.slide
    
                                setTimeout(() => {
                                    this.$refs.slide.style.height = this.$refs.slide.scrollHeight + 'px'
                                }, 40)
                            }
                        },
            
                        toggle(e) {
                            if (this.show && this.show === e.currentTarget.dataset.slide) {
                                this.close()
                            } else {
                                this.open(e, e.currentTarget.dataset.slide)
                            }
                        }
                    }))
                })
            })()
        </script>
    @endonce
@endpush