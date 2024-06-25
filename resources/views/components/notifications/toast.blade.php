<li @attributes(null, ['x-data', 'x-ref', 'x-show', '@mousedown', '@mousemove', '@mouseup.window', '@touchstart', '@touchmove', '@touchend'], [
    "absolute top-3 right-3 flex gap-3 select-none bg-white p-3 rounded-lg duration-300 border border-dark/5 w-full max-w-sm ml-auto shadow-custom-lg pointer-events-auto dark:bg-black dark:border-light/5"
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
    {{-- @wheel="handleScroll" --}}
    x-transition:enter="ease-out"
    x-transition:enter-start="opacity-0 scale-90"
    x-transition:enter-end="opacity-100 scale-100"
    x-transition:leave="ease-in"
    x-transition:leave-start="opacity-100 scale-100"
    x-transition:leave-end="opacity-0 scale-90"
    style="top: {{ isset($index) ? ($index * 4) + 12 : 0 }}px; right: {{ isset($index) ? ($index * 4) + 12 : 0 }}px;"
    >
    @isset($icon)
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
    @endisset
    <div class="grow">
        <div class="flex justify-between items-center">
            @isset($title)
                <h3 class="font-medium">{{ $title }}</h3>
            @endisset
            @isset ($closeable)
                <button @click="close" class="focus-none p-1 duration-200 text-black/25 hover:text-primary dark:text-white/25 dark:hover:text-primary-dark">
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
            document.addEventListener('alpine:init', () => {
                Alpine.data('toast', () => ({
                    show: true,
                    dragging: false,
                    touchstartX: 0,
                    touchendX: 0,
                    wheelTimeout: null,

                    init() {
                        setTimeout(() => {
                            this.close();
                        }, 60000);
                    },

                    close() {
                        this.show = false;
                        setTimeout(() => {
                            this.$refs.toast.remove();
                        }, 300);
                    },

                    /**
                     * TODO: Fix scroll event - sccrolls toasts underneath when the top toast has moved
                     * @param {WheelEvent} e
                     */
                    handleScroll(e) {
                        e.preventDefault();
                        clearTimeout(this.wheelTimeout);

                        if (e.deltaX > 0) return;
                        this.$refs.toast.style.transform = `translateY(${Math.abs(e.deltaY)}px)`;

                        this.touchendX -= e.deltaX;

                        this.$refs.toast.style.transition = 'none';
                        this.$refs.toast.style.transform = `translateX(${this.touchendX}px)`;

                        this.wheelTimeout = setTimeout(() => {
                            this.$refs.toast.style.transition = '';
                            this.handleSwipeGesture();
                        }, 50);
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

                    handleSwipeGesture() {
                        const swipeThreshold = this.$refs.toast.getBoundingClientRect().width / 2;

                        if (this.touchendX > this.touchstartX + swipeThreshold) {
                            this.$refs.toast.style.transform = `translateX(${this.$refs.toast.getBoundingClientRect().width + 128}px)`;
                            setTimeout(() => {
                                this.close();
                            }, 300);
                        } else {
                            this.$refs.toast.style.transform = '';
                        }

                        this.touchstartX = 0;
                        this.touchendX = 0;
                    }
                }));
            });
        </script>
    @endonce
@endpush