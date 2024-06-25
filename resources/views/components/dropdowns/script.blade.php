@push('scripts')
    @once
        <script>
            (function() {
                document.addEventListener('alpine:init', () => {
                    Alpine.data('dropdown', () => ({
                        show: false,
    
                        close() {
                            this.show = false
                        },
    
                        open() {
                            this.show = true
                        },
            
                        toggle() {
                            this.show = ! this.show
                        }
                    }))
                })
            })()
        </script>
    @endonce
@endpush