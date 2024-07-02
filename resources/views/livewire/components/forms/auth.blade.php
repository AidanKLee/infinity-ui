
<div class="px-3 py-6">
    <template x-if="!register">
        <div>
            <template x-if="!resetPassword">
                <form class="flex flex-col px-3 space-y-3" wire:submit="handleLogin">
                    <x-inputs.text id="login-email" label="Email" placeholder="Enter your email" wire:model="login.email" floating prefix-inset>
                        <x-slot name="prefix">
                            <label for="login-email" class="flex justify-center items-center h-[50px] w-[50px]">
                                <x-icons.email class="w-5 h-5 text-dark/50 dark:text-light/50" />
                            </label>
                        </x-slot>
                    </x-inputs.text>
                    <x-inputs.text id="login-password" label="Password" placeholder="Enter your password" wire:model="login.password" floating password prefix-inset>
                        <x-slot name="prefix">
                            <label for="login-password" class="flex justify-center items-center h-[50px] w-[50px]">
                                <x-icons.lock class="w-5 h-5 text-dark/50 dark:text-light/50" />
                            </label>
                        </x-slot>
                    </x-inputs.text>
                    <button class="link text-xs ml-auto" type="button" @click="toggleResetPassword">Forgot your password?</button>
                    <button class="btn primary w-full justify-center py-2" wire:loading.attr="disabled">
                        <x-icons.spinner class="h-6 w-6" wire:loading />
                        <span>Sign In</span>
                    </button>
                </form>
            </template>
            <template x-if="resetPassword">
                <form class="flex flex-col px-3 space-y-3" wire:submit.prevent="handleResetPassword">
                    <x-inputs.text id="forgot-password-email" label="Email" placeholder="Enter your email" wire:model="password.email" floating prefix-inset>
                        <x-slot name="prefix">
                            <label for="forgot-password-email" class="flex justify-center items-center h-[50px] w-[50px]">
                                <x-icons.email class="w-5 h-5 text-dark/50 dark:text-light/50" />
                            </label>
                        </x-slot>
                    </x-inputs.text>
                    <button class="link text-xs ml-auto" type="button" @click="toggleResetPassword">Remember your password?</button>
                    <button class="btn primary w-full justify-center py-2" wire:loading.attr="disabled">
                        <x-icons.spinner class="h-6 w-6" wire:loading />
                        <span>Reset Password</span>
                    </button>
                </form>
            </template>
        </div>
    </template>
    <template x-if="register">
        <form class="px-3 space-y-3" wire:submit.prevent="handleRegister">
            <x-inputs.text id="register-name" label="Name" placeholder="Enter your name" wire:model="register.name" floating prefix-inset>
                <x-slot name="prefix">
                    <label for="register-name" class="flex justify-center items-center h-[50px] w-[50px]">
                        <x-icons.user class="w-5 h-5 text-dark/50 dark:text-light/50" />
                    </label>
                </x-slot>
            </x-inputs.text>
            <x-inputs.text id="register-email" label="Email" placeholder="Enter your email" wire:model="register.email" floating prefix-inset>
                <x-slot name="prefix">
                    <label for="register-email" class="flex justify-center items-center h-[50px] w-[50px]">
                        <x-icons.email class="w-5 h-5 text-dark/50 dark:text-light/50" />
                    </label>
                </x-slot>
            </x-inputs.text>
            <x-inputs.text id="register-password" label="Password" placeholder="Enter your password" wire:model="register.password" floating password prefix-inset>
                <x-slot name="prefix">
                    <label for="register-password" class="flex justify-center items-center h-[50px] w-[50px]">
                        <x-icons.lock class="w-5 h-5 text-dark/50 dark:text-light/50" />
                    </label>
                </x-slot>
            </x-inputs.text>
            <x-inputs.text id="register-confirm-password" label="Confirm password" placeholder="Re-enter your password" wire:model="register.password_confirmation" floating password prefix-inset>
                <x-slot name="prefix">
                    <label for="register-confirm-password" class="flex justify-center items-center h-[50px] w-[50px]">
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
