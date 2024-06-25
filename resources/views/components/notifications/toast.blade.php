<li @attributes(null, ['x-data', 'x-ref', 'x-show', '@mousedown', '@mousemove', '@mouseup.window', '@touchstart', '@touchmove', '@touchend'], [
    "toast"
]) 
    x-data="toast"
    x-ref="toast"
    x-show="show"
    @mousedown="startSwipe"
    @mousemove="swipe" 
    @mouseup.window="endSwipe" 
    @touchstart="startSwipe" 
    @touchmove="swipe"
    @touchend.window="endSwipe"
    @wheel="handleScroll"
    x-transition:enter="ease-out"
    x-transition:enter-start="opacity-0 scale-90"
    x-transition:enter-end="opacity-100 scale-100"
    x-transition:leave="ease-in"
    x-transition:leave-start="opacity-100 scale-100"
    x-transition:leave-end="opacity-0 scale-90"
    >
    @isset($icon)
        <div>
            <div @class([
                'flex justify-center items-center h-5 w-5 p-0.5 mt-0.5 border rounded-full',
                'bg-secondary/10 border-secondary text-secondary dark:bg-secondary-dark/10 dark:border-secondary-dark dark:text-secondary-dark' => $icon === 'success',
                'bg-danger/10 border-danger text-danger' => $icon === 'error',
                'bg-warning/10 border-warning text-warning text-sm' => $icon === 'warning',
                'bg-info/10 border-info text-info text-sm dark:bg-info-dark/10 dark:border-infor-dark dark:text-info-dark' => $icon === 'info',
                isset($iconClass) && !in_array($icon, ['success', 'error', 'warning', 'info']) ? $iconClass : '',
            ])>
                @if ($icon === 'success')
                    <x-icons.check />
                @elseif ($icon === 'error')
                    <x-icons.cross />
                @elseif ($icon === 'warning')
                    <span>!</span>
                @elseif ($icon === 'info')
                    <span>i</span>
                @else
                    {{ $icon }}
                @endif
            </div>
        </div>
    @endisset
    <div class="grow">
        <div class="flex justify-between items-center">
            @isset($title)
                <h3 class="font-medium">{{ $title }}</h3>
            @endisset
            @isset ($closeable)
                <button @click="close(false)" class="focus-none p-1 duration-200 text-black/25 hover:text-primary dark:text-white/25 dark:hover:text-primary-dark">
                    <x-icons.cross class="w-4 h-4" />
                </button>
            @endisset
        </div>
        @isset($slot) 
            <p class="text-sm font-light text-black/60 dark:text-white/60">{{ $slot }}</p>
        @endisset
    </div>
</li>

@push('scripts')
    @once
        <script>
            (function() {
                document.addEventListener('alpine:init', () => {
                    Alpine.data('toast', () => ({
                        show: true,
                        dragging: false,
                        touchstartX: 0,
                        touchendX: 0,
                        wheelTimeout: null,
                        initTimeout: null,
    
                        init() {
                            this.initTimeout = setTimeout(() => {
                                this.close();
                            }, 60000);
                        },
    
                        close(isOffscreen = false) {
                            this.show = false;

                            if (isOffscreen) {
                                this.$refs.toast.remove();
                            } else {
                                setTimeout(() => {
                                    this.$refs.toast.remove();
                                }, 300);
                            }
                        },
    
                        handleScroll(e) {
                            e.preventDefault();
                            
                            if (this.$refs.toast.hasAttribute('data-no-scroll')) {
                                return;
                            }
    
                            if (e.deltaX > 0 && this.parseIntFromTransform(this.$refs.toast.style.transform ?? 0) <= 0) {
                                this.wheelTimeout = setTimeout(() => {
                                    this.$refs.toast.style.transition = '';
    
                                    this.recursivelyEnablePointerEvents(document.documentElement);
    
                                    this.handleSwipeGesture(this.$refs.toast.getBoundingClientRect().width / 8);
                                }, 50);
                                return
                            }
                            
                            clearTimeout(this.wheelTimeout);
    
                            // this.disableWindowScrolling();
                            this.recursivelyDisablePointerEvents(document.documentElement, this.$refs.toast);
    
                            this.$refs.toast.style.transform = `translateY(${Math.abs(e.deltaY)}px)`;
    
                            this.touchendX -= e.deltaX;
    
                            this.$refs.toast.style.transition = 'none';
                            this.$refs.toast.style.transform = `translateX(${this.touchendX}px)`;
    
                            this.wheelTimeout = setTimeout(() => {
                                this.$refs.toast.style.transition = '';
    
                                // this.enableWindowScrolling()
                                this.recursivelyEnablePointerEvents(document.documentElement);
    
                                this.handleSwipeGesture(this.$refs.toast.getBoundingClientRect().width / 8);
                            }, 50);
                        },
    
                        addDataNotScrollToOtherToasts() {
                            document.querySelectorAll('[x-data="toast"]').forEach(toast => {
                                console.log(toast, this.$refs.toast)
                                if (toast !== this.$refs.toast) {
                                    toast.setAttribute('data-no-scroll', '');
                                }
                            });
                        },
    
                        removeDataNotScrollFromOtherToasts() {
                            document.querySelectorAll('[x-data="toast"]').forEach(toast => {
                                delete toast.dataset.noScroll;
                            });
                        },
    
                        preventDefault(e) {
                                e.preventDefault();
                        },
    
                        disableWindowScrolling() {
                            this.addDataNotScrollToOtherToasts();
                            window.addEventListener('DOMMouseScroll', this.preventDefault.bind(this), false);
                            window.addEventListener('wheel', this.preventDefault.bind(this), { passive: false });
                            window.addEventListener('touchmove', this.preventDefault.bind(this), { passive: false });
                        },
    
                        enableWindowScrolling() {
                            setTimeout(() => {
                                this.removeDataNotScrollFromOtherToasts();
                            }, 300);
                            window.removeEventListener('DOMMouseScroll', this.preventDefault.bind(this), false);
                            window.removeEventListener('wheel', this.preventDefault.bind(this), { passive: false });
                            window.removeEventListener('touchmove', this.preventDefault.bind(this), { passive: false });
                        },
    
                        isElementAToast(event) {
                            let element = event.target;
                            while (element) {
                                if (element.hasAttribute('x-ref') && element.getAttribute('x-ref') === 'toast'){
                                    return true;
                                }
                                element = element.parentElement;
                            }
                            return false;
                        },
    
                        recursivelyDisablePointerEvents(element, ignoreElement) {
                            if (!element || element === ignoreElement) {
                                return
                            }
                            
                            if (element.style) {
                                element.style.pointerEvents = 'none'
                                element.childNodes.forEach(child => this.recursivelyDisablePointerEvents(child, ignoreElement))
                            }
                        },
    
                        recursivelyEnablePointerEvents(element) {
                            if (!element) {
                                return
                            }
                            
                            if (element.style) {
                                element.style.pointerEvents = ''
                                element.childNodes.forEach(child => this.recursivelyEnablePointerEvents(child))
                            }
                        },
    
                        parseIntFromTransform(transformString) {
                            const transformInt = parseInt(transformString.replace('translateX(', '').replace('px)', ''));
                            return Number.isNaN(transformInt) ? 0 : transformInt;
                        },
    
                        startSwipe(event) {
                            this.$refs.toast.style.transition = 'none';
                            this.dragging = true;
                            this.touchstartX = this.getEventX(event);
                        },
    
                        swipe(event) {
                            if (!this.dragging) return;
                            if (this.getEventX(event) - this.touchstartX > 0) {
                                this.$refs.toast.style.transform = `translateX(${this.getEventX(event) - this.touchstartX}px)`;
                            }
                        },
    
                        endSwipe(event) {
                            if (!this.dragging) return;
                            this.$refs.toast.style.transition = '';
                            this.dragging = false;
                            this.touchendX = this.getEventX(event);
                            this.handleSwipeGesture();
                        },
    
                        getEventX(event) {
                            return event.changedTouches ? event.changedTouches[0].screenX : event.screenX;
                        },
    
                        handleSwipeGesture(customThreshold = null) {
                            const swipeThreshold = customThreshold ?? this.$refs.toast.getBoundingClientRect().width / 2;
    
                            if (this.touchendX > this.touchstartX + swipeThreshold) {
                                this.$refs.toast.style.transform = `translateX(${this.$refs.toast.getBoundingClientRect().width + 128}px)`;
                                clearTimeout(this.initTimeout);
                                setTimeout(() => {
                                    this.close(true);
                                }, 300);
                            } else {
                                this.$refs.toast.style.transform = '';
                            }
    
                            this.touchstartX = 0;
                            this.touchendX = 0;
                        }
                    }));
                });
            })()
        </script>
    @endonce
@endpush