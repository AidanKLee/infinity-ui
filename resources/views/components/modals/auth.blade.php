<x-modals.container :class="$class ?? ''" x-data="auth_modal" size="lg" x-show="$store.modals.show.includes('auth')" @click.close="$store.modals.close(['auth'])" @click.outside="$store.modals.close(['auth'])" @keydown.window.esc="$store.modals.close(['auth'])">
    <x-slot:header>
        <div class="text-center px-3">
            <h2 class="text-lg font-semibold" x-text="title"></h2>
            <p class="text-xs text-black/60 dark:text-white/60" x-text="copy"></p>
        </div>
    </x-slot:header>
    <livewire:components.forms.auth />
    <x-slot:footer>
        <div class="text-center px-3 pb-6">
            <p class="text-sm text-black/60 dark:text-white/60" x-text="registerText"></p>
            <button class="link" @click="toggle" type="button" x-text="linkText"></button>
        </div>
    </x-slot:footer>
</x-modals.container>

@push('scripts')
    @once
    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('auth_modal', () => ({
                register: false,
                title: 'Sign in',
                copy: 'Ready to jump back in? Sign in now to pick up where you left off.',
                registerText: 'Not registered yet?',
                linkText: 'Create an account',

                init() {
                    // add a listener to open the modal in a particular state (register or sign in)
                    // using this.setToRegister method
                    Livewire.on('auth-changed', () => this.$store.modals.close(['auth']))
                },

                setTextContent() {
                    if (this.register) {
                        this.title = 'Sign up'
                        this.copy = 'Start your journey with us by signing up for a new account.'
                        this.registerText = 'Already registered?'
                        this.linkText = 'Sign in to your account'
                    } else {
                        this.title = 'Sign in'
                        this.copy = 'Ready to jump back in? Sign in now to pick up where you left off.'
                        this.registerText = 'Not registered yet?'
                        this.linkText = 'Create an account'
                    }
                },

                setToRegister(isRegistering = true) {
                    this.register = isRegistering
                    this.setTextContent()
                },
     
                toggle() {
                    this.register = !this.register
                    this.setTextContent()
                }
            }))
        })
    </script>
    @endonce
@endpush