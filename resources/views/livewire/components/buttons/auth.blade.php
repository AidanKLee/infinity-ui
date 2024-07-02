<div @class(['max-w-[176px]' => !isset($fullWidth)])>
    @guest
        <button @class([
            'navlink relative w-full justify-start',
            'bg-black/2.5 dark:bg-white/2.5' => isset($fullWidth),
        ]) @click="$store.modals.open('auth')">
            <div>
                <x-icons.user class="w-7 h-7" />
            </div>
            <div @class([
                'flex flex-col text-left',
                'sr-only md:not-sr-only' => !isset($fullWidth),
            ])>
                <span class="text-xs leading-tight whitespace-nowrap">Hi there,</span>
                <span class="leading-tight whitespace-nowrap">Login / Register</span>
            </div>
        </button>
    @else
        <div class="relative" x-data="dropdown" @click.outside="close" @keydown.window.esc="close">
            <button @class([
                'navlink group relative w-full max-w-full',
                'bg-black/2.5 dark:bg-white/2.5' => isset($fullWidth),
            ]) @click="toggle">
                <div>
                    <img src="{{ asset('assets/images/avatar.jpg') }}" alt="avatar" class="w-[35px] h-[35px] max-w-none rounded-full border border-black/20 duration-200 group-hover:border-primary/20 group-focus:border-primary/20 dark:border-white/20 dark:group-hover:border-primary-dark/20 dark:group-focus:border-primary-dark/20" />
                    {{-- <x-icons.user class="w-7 h-7" /> --}}
                </div>
                <div @class([
                    'flex flex-1 flex-col !overflow-hidden text-left',
                    'sr-only md:not-sr-only' => !isset($fullWidth),
                ]) class="">
                    <span class="flex-1 leading-tight truncate">{{ auth()->user()->name }}</span>
                    <span class="flex-1 text-xs leading-tight truncate">{{ auth()->user()->email }}</span>
                </div>
            </button>
            <x-dropdowns.navlink @class([
                'max-w-56 right-0 text-sm overflow-hidden',
                'min-w-full' => !isset($fullWidth),
                'w-full' => isset($fullWidth),
            ]) x-show="show" position="right">
                <ul class="flex flex-col">
                    <li>
                        <button class="navlink justify-start w-full rounded-none whitespace-nowrap" wire:click="handleLogout">
                            <div>
                                <x-icons.logout class="h-5 w-5" />
                            </div>
                            <span class="flex-1 truncate text-left">Sign out</span>
                        </button>
                    </li>
                </ul>
            </x-dropdowns.navlink>
        </div>
    @endif
</div>

<x-dropdowns.script />