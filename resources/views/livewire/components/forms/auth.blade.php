
<div class="px-3 py-6">
    <template x-if="!register">
        <form class="px-3 space-y-3" wire:submit="handleLogin">
            <x-inputs.text id="auth-email" label="Email" placeholder="Enter your email" wire:model="login.email" floating prefix-inset>
                <x-slot name="prefix">
                    <label for="auth-email" class="flex justify-center items-center h-[50px] w-[50px]">
                        <x-icons.email class="w-5 h-5 text-dark/50 dark:text-light/50" />
                    </label>
                </x-slot>
            </x-inputs.text>
            <x-inputs.text id="auth-password" label="Password" placeholder="Enter your password" wire:model="login.password" floating password prefix-inset>
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
        <form class="px-3 space-y-3" wire:submit.prevent="handleRegister">
            <x-inputs.text id="auth-name" label="Name" placeholder="Enter your name" wire:model="register.name" floating prefix-inset>
                <x-slot name="prefix">
                    <label for="auth-email" class="flex justify-center items-center h-[50px] w-[50px]">
                        <x-icons.user class="w-5 h-5 text-dark/50 dark:text-light/50" />
                    </label>
                </x-slot>
            </x-inputs.text>
            <x-inputs.text id="auth-email" label="Email" placeholder="Enter your email" wire:model="register.email" floating prefix-inset>
                <x-slot name="prefix">
                    <label for="auth-email" class="flex justify-center items-center h-[50px] w-[50px]">
                        <x-icons.email class="w-5 h-5 text-dark/50 dark:text-light/50" />
                    </label>
                </x-slot>
            </x-inputs.text>
            <x-inputs.text id="auth-password" label="Password" placeholder="Enter your password" wire:model="register.password" floating password prefix-inset>
                <x-slot name="prefix">
                    <label for="auth-password" class="flex justify-center items-center h-[50px] w-[50px]">
                        <x-icons.lock class="w-5 h-5 text-dark/50 dark:text-light/50" />
                    </label>
                </x-slot>
            </x-inputs.text>
            <x-inputs.text id="auth-confirm-password" label="Confirm password" placeholder="Re-enter your password" wire:model="register.password_confirmation" floating password prefix-inset>
                <x-slot name="prefix">
                    <label for="auth-confirm-password" class="flex justify-center items-center h-[50px] w-[50px]">
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
