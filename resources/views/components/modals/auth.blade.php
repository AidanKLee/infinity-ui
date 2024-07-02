<x-modals.container :class="$class ?? ''" x-data="auth_modal" size="lg" x-show="$store.modals.show.includes('auth')" @click.close="close" @click.outside="close" @keydown.window.esc="close">
    <x-slot:header>
        <div class="text-center px-6">
            <h2 class="text-lg font-semibold" x-text="title"></h2>
            <p class="text-xs text-black/60 dark:text-white/60" x-text="copy"></p>
        </div>
    </x-slot:header>
    <livewire:components.forms.auth />
    <x-slot:footer>
        <div class="text-center px-6 pb-6">
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
                resetPassword: false,
                title: 'Sign in',
                copy: 'Ready to jump back in? Sign in now to pick up where you left off.',
                registerText: 'Not registered yet?',
                linkText: 'Create an account',

                init() {
                    // add a listener to open the modal in a particular state (register or sign in)
                    // using this.setToRegister method
                    Livewire.on('auth-changed', () => this.close())
                },

                close() {
                    this.$store.modals.close(['auth'])

                    setTimeout(() => {
                        this.register = false
                        this.resetPassword = false
                        this.setTextContent()
                    }, 300)
                },

                setTextContent() {
                    if (this.register) {
                        this.title = 'Sign up'
                        this.copy = 'Start your journey with us by signing up for a new account.'
                        this.registerText = 'Already registered?'
                        this.linkText = 'Sign in to your account'
                    } else {
                        if (!this.resetPassword) {
                            this.title = 'Sign in'
                            this.copy = 'Ready to jump back in? Sign in now to pick up where you left off.'
                            this.registerText = 'Not registered yet?'
                            this.linkText = 'Create an account'
                        } else {
                            this.title = 'Reset password'
                            this.copy = 'Forgot your password? No worries! Enter your email address and we will send you a link to reset your password.'
                            this.registerText = 'Not registered yet?'
                            this.linkText = 'Create an account'
                        }
                    }
                },

                setToRegister(isRegistering = true) {
                    this.register = isRegistering
                    this.setTextContent()
                },
     
                toggle() {
                    this.register = !this.register
                    this.resetPassword = false
                    this.setTextContent()
                },

                toggleResetPassword() {
                    this.resetPassword = !this.resetPassword
                    this.setTextContent()
                }
            }))
        })
    </script>
    @endonce
@endpush