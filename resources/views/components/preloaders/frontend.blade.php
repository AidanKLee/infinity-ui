@push('preloader')
    @once
        <div class="fixed inset-0 z-[100] flex items-center justify-center pointer-events-none" x-data="preloader" preloader="1000">
            <div class="absolute top-0 left-0 h-full w-1/5 inset-0 bg-light origin-top dark:bg-dark" data-preloader-strip></div>
            <div class="absolute top-0 left-[20%] h-full w-1/5 inset-0 bg-light origin-top dark:bg-dark" data-preloader-strip></div>
            <div class="absolute top-0 left-[40%] h-full w-1/5 inset-0 bg-light origin-top dark:bg-dark" data-preloader-strip></div>
            <div class="absolute top-0 left-[60%] h-full w-1/5 inset-0 bg-light origin-top dark:bg-dark" data-preloader-strip></div>
            <div class="absolute top-0 left-[80%] h-full w-1/5 inset-0 bg-light origin-top dark:bg-dark" data-preloader-strip></div>
            <div class="relative z-10 flex flex-col items-center justify-center" data-preloader-data>
                <div class="relative">
                    <x-icons.spinner class="w-20 h-20 text-primary dark:text-primary-dark animate-spin" />
                    <p class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 text-xs text-center font-bold text-primary dark:text-primary-dark" preloader.progress>0%</p>
                </div>
                <div class="h-1 min-w-48 rounded-3xl bg-primary/10 mt-3 overflow-hidden dark:bg-primary-dark/10">
                    <div class="h-full w-0 bg-primary duration-200 dark:bg-primary-dark" preloader.bar></div>
                </div>
                <p class="text-sm font-light mt-1">Loading<span preloader.dots></span></p>
            </div>
        </div>
    @endonce
@endpush

@push('scripts')
    @once
        <script>
            (function() {
                document.addEventListener('alpine:init', () => {
                    Alpine.data('preloader', () => ({
                        init() {
                            setTimeout(() => {
                                if (window.smoothScroll) {
                                    window.smoothScroll.scrollTo(0)
                                } else {
                                    window.scrollTo({
                                        top: 0,
                                        behavior: 'instant',
                                    })
        
                                    document.body.style.overflow = 'hidden'
                                }
                            }, 0)

                            Pace.on('done', this.handleDone.bind(this))

                            document.querySelectorAll('a').forEach((el) => {
                                el.addEventListener('click', (e) => {
                                    const href = el.getAttribute('href')

                                    if (el.target === '_blank' || href.startsWith('#') || href.startsWith('mailto:') || href.startsWith('tel:') || href.startsWith('javascript:') || href === '' || href === '/' || href === window.location.href) {
                                        return
                                    }

                                    e.preventDefault();

                                    gsap.timeline({
                                        onComplete: () => {
                                            window.location.href = href
                                        }
                                    }).to('[data-preloader-strip]', {
                                        scaleY: 1, duration: 1, stagger: 0.1, ease: 'power2.inOut'
                                    })
                                })
                            })
                        },

                        handleDone() {
                            gsap.timeline()
                                .to('[data-preloader-data]', { opacity: 0, duration: 0.5 })
                                .to('[data-preloader-strip]', { scaleY: 0, duration: 1, stagger: 0.1, ease: 'power2.inOut' })

                            setTimeout(() => {
                                animations.play()
                                if (!window.smoothScroll) {
                                    document.body.style.overflow = ''
                                }
                            }, 1000)
                        }
                    }))
                })
            })()
        </script>
    @endonce
    
@endpush