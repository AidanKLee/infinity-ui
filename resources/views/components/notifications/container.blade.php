@isset($slot)
    <div @attributes(null, null, [
        'absolute top-0 right-0 w-full pointer-events-none',
    ])>
        <ul class="notification-container" x-data="notification_container" x-ref="notification-container" @scroll.window="positionNotifications" @resize.window="positionNotifications">
            {{ $slot }}
        </ul>
    </div>
@endisset

@push('scripts')
    @once
        <script>
            document.addEventListener('alpine:init', () => {
                Alpine.data('notification_container', () => ({
                    headerHeight: document.getElementById('page-header').offsetHeight,
                    init() {
                        this.positionNotifications()
                    },
                    positionNotifications() {
                        const container = this.$refs['notification-container']
                        const headerHeight = document.getElementById('page-header').offsetHeight

                        if (headerHeight !== this.headerHeight) {
                            container.style.marginTop = `${headerHeight}px`
                            this.headerHeight = headerHeight
                        }

                        if (window.scrollY >= this.headerHeight && container.style.position !== 'fixed') {
                            container.style.position = 'fixed'
                            container.style.top = `-${this.headerHeight}px`
                        } else if (window.scrollY < this.headerHeight && container.style.position === 'fixed') {
                            container.style.position = ''
                            container.style.top = ''
                        }
                    }
                }))
            })
        </script>
    @endonce
@endpush