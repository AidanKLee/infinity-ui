<x-modals.container x-data="auth_modal" size="lg" x-show="$store.modals.show.includes('auth')" @click.close="$store.modals.close()" @click.outside="$store.modals.close()" @keydown.window.esc="$store.modals.close()">
    <x-slot:header>
        <div class="text-center px-3 mb-6">
            <h2 class="text-lg font-semibold" x-text="title"></h2>
            <p class="text-xs text-black/50 dark:text-white/50" x-text="copy"></p>
        </div>
    </x-slot:header>

    <div class="px-3 mb-6">
        <template x-if="!register">
            <form class="px-3 mb-6 space-y-3">
                <x-inputs.text id="auth-email" label="Email" placeholder="Enter your email" floating prefix-inset>
                    <x-slot name="prefix">
                        <label for="auth-email" class="flex justify-center items-center h-[50px] w-[50px]">
                            <x-icons.email class="w-5 h-5 text-dark/50 dark:text-light/50" />
                        </label>
                    </x-slot>
                </x-inputs.text>
                <x-inputs.text id="auth-password" label="Password" placeholder="Enter your password" floating password prefix-inset>
                    <x-slot name="prefix">
                        <label for="auth-password" class="flex justify-center items-center h-[50px] w-[50px]">
                            <x-icons.lock class="w-5 h-5 text-dark/50 dark:text-light/50" />
                        </label>
                    </x-slot>
                </x-inputs.text>
                <button class="btn primary w-full justify-center py-2" wire:loading.attr="disabled">
                    <x-icons.spinner class="h-6 w-6" wire:loading />
                    <span>Sign In</span>
                </button>
            </form>
        </template>
        <template x-if="register">
            <form class="px-3 mb-6 space-y-3">
                <x-inputs.text id="auth-name" label="Name" placeholder="Enter your name" floating prefix-inset>
                    <x-slot name="prefix">
                        <label for="auth-email" class="flex justify-center items-center h-[50px] w-[50px]">
                            <x-icons.user class="w-5 h-5 text-dark/50 dark:text-light/50" />
                        </label>
                    </x-slot>
                </x-inputs.text>
                <x-inputs.text id="auth-email" label="Email" placeholder="Enter your email" floating prefix-inset>
                    <x-slot name="prefix">
                        <label for="auth-email" class="flex justify-center items-center h-[50px] w-[50px]">
                            <x-icons.email class="w-5 h-5 text-dark/50 dark:text-light/50" />
                        </label>
                    </x-slot>
                </x-inputs.text>
                <x-inputs.text id="auth-password" label="Password" placeholder="Enter your password" floating password prefix-inset>
                    <x-slot name="prefix">
                        <label for="auth-password" class="flex justify-center items-center h-[50px] w-[50px]">
                            <x-icons.lock class="w-5 h-5 text-dark/50 dark:text-light/50" />
                        </label>
                    </x-slot>
                </x-inputs.text>
                <button class="btn primary w-full justify-center py-2" wire:loading.attr="disabled">
                    <x-icons.spinner class="h-6 w-6" wire:loading />
                    <span>Sign Up</span>
                </button>
            </form>
        </template>
    </div>
    <x-slot:footer>
        <div class="text-center px-3 pb-6">
            <p class="text-sm" x-text="registerText"></p>
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
     
                toggle() {
                    this.register = !this.register

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
                }
            }))
        })
    </script>
    @endonce
@endpush