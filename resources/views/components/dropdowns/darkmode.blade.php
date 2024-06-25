<div>
    <div class="relative" x-data="dropdown" @click.outside="close" @keydown.window.esc="close">
        <x-buttons.icon class="text-warning" ::class="{'text-primary bg-dark/2.5 ring-2 ring-primary dark:bg-light/2.5 dark:ring-primary-dark dark:text-primary-dark': show}" name="Select theme" @click="toggle">
            <div x-show="$store.darkMode.theme === 'dark'" style="display: none;">
                <x-icons.moon />
            </div>
            <div x-show="$store.darkMode.theme === 'light'">
                <x-icons.sun />
            </div>
        </x-buttons.icon>
        <x-dropdowns.navlink class="w-48" x-show="show">
            <ul class="flex flex-col gap-1 p-1">
                <x-dropdowns.items.navlink ::class="{'bg-secondary/5 text-secondary dark:text-secondary-dark dark:bg-secondary-dark/20': $store.darkMode.mode === 'system'}">
                    <div class="flex items-center">
                        <x-icons.computer class="h-4 w-4" />
                    </div>
                    <button class="focus-none" @click="$store.darkMode.updateTheme($event)" data-theme-mode="system">
                        <p class="text-xs">Use the system theme</p>
                        <span class="absolute inset-0"></span>
                    </button>
                </x-dropdowns.items.navlink>
                <x-dropdowns.items.navlink ::class="{'bg-secondary/5 text-secondary dark:text-secondary-dark dark:bg-secondary-dark/20': $store.darkMode.mode === 'light'}">
                    <div class="flex items-center">
                        <x-icons.sun class="h-4 w-4" />
                    </div>
                    <button class="focus-none" @click="$store.darkMode.updateTheme($event)" data-theme-mode="light">
                        <p class="text-xs">Use the light theme</p>
                        <span class="absolute inset-0"></span>
                    </button>
                </x-dropdowns.items.navlink>
                <x-dropdowns.items.navlink ::class="{'bg-secondary/5 text-secondary dark:text-secondary-dark dark:bg-secondary-dark/20': $store.darkMode.mode === 'dark'}">
                    <div class="flex items-center">
                        <x-icons.moon class="h-4 w-4" />
                    </div>
                    <button class="focus-none" @click="$store.darkMode.updateTheme($event)" data-theme-mode="dark">
                        <p class="text-xs">Use the dark theme</p>
                        <span class="absolute inset-0"></span>
                    </button>
                </x-dropdowns.items.navlink>
            </ul>
        </x-dropdowns.navlink>
    </div>
</div>

@push('scripts')
    @once
        <x-dropdowns.script />
    @endonce
@endpush

@push('scripts')
    @once
        <script>
            (function() {
                recursivelyDisableTransition(document.documentElement)

                if (!('theme' in localStorage)) {
                    if (window.matchMedia('(prefers-color-scheme: dark)').matches) {
                        document.documentElement.classList.add('dark')
                    } else {
                        document.documentElement.classList.remove('dark')
                    }
                } else {
                    const theme = localStorage.theme

                    if (this.theme === 'dark') {
                        document.documentElement.classList.add('dark')
                    } else {
                        document.documentElement.classList.remove('dark')
                    }
                }

                recursivelyEnableTransition(document.documentElement)

                function recursivelyDisableTransition(element = null) {
                    if (!element) {
                        return
                    }
                    
                    if (element.style) {
                        element.style.transition = 'none'
                        element.childNodes.forEach(child => recursivelyDisableTransition(child))
                    }
                }

                function recursivelyEnableTransition(element) {
                    if (!element) {
                        return
                    }
                    
                    if (element.style) {
                        element.style.transition = ''
                        element.childNodes.forEach(child => recursivelyEnableTransition(child))
                    }
                }

                document.addEventListener('alpine:init', () => {
                    Alpine.store('darkMode', {
                        checker: null,
                        mode: 'system',
                        theme: '',
    
                        init() {
                            recursivelyDisableTransition(document.documentElement)
    
                            if (!('theme' in localStorage)) {
                                this.mode = 'system'
    
                                if (window.matchMedia('(prefers-color-scheme: dark)').matches) {
                                    this.theme = 'dark'
                                    document.documentElement.classList.add('dark')
                                } else {
                                    this.theme = 'light'
                                    document.documentElement.classList.remove('dark')
                                }
    
                                this.checkSystemTheme();
                            } else {
                                this.theme = localStorage.theme
    
                                if (this.theme === 'dark') {
                                    this.mode = 'dark'
                                    document.documentElement.classList.add('dark')
                                } else {
                                    this.mode = 'light'
                                    document.documentElement.classList.remove('dark')
                                }
                            }
    
                            recursivelyEnableTransition(document.documentElement)
                        },
    
                        checkSystemTheme() {
                            if (this.mode === 'system') {
                                if (window.matchMedia('(prefers-color-scheme: dark)').matches && this.theme !== 'dark') {
                                    recursivelyDisableTransition(document.documentElement)
                                    this.theme = 'dark'
                                    document.documentElement.classList.add('dark')
                                    recursivelyEnableTransition(document.documentElement)
                                } else if (!window.matchMedia('(prefers-color-scheme: dark)').matches && this.theme !== 'light') {
                                    recursivelyDisableTransition(document.documentElement)
                                    this.theme = 'light'
                                    document.documentElement.classList.remove('dark')
                                    recursivelyEnableTransition(document.documentElement)
                                }
                            }
    
                            this.checker = requestAnimationFrame(this.checkSystemTheme.bind(this))
                        },
            
                        updateTheme(e) {
                            if (this.mode === e.currentTarget.dataset.themeMode) return;
    
                            this.mode = e.currentTarget.dataset.themeMode;
    
                            this.recursivelyDisableTransition(document.documentElement)
                            
                            if (this.mode === 'system') {
                                localStorage.removeItem('theme')
                                
                                if (window.matchMedia('(prefers-color-scheme: dark)').matches) {
                                    this.theme = 'dark'
                                    document.documentElement.classList.add('dark')
                                } else {
                                    this.theme = 'light'
                                    document.documentElement.classList.remove('dark')
                                }
    
                                this.recursivelyEnableTransition(document.documentElement)
    
                                return this.checkSystemTheme();
                            } else if (this.mode === 'dark') {
                                this.theme = 'dark'
                                localStorage.theme = 'dark'
                                document.documentElement.classList.add('dark')
                            } else {
                                this.theme = 'light'
                                localStorage.theme = 'light'
                                document.documentElement.classList.remove('dark')
                            }
    
                            this.recursivelyEnableTransition(document.documentElement)
    
                            cancelAnimationFrame(this.checker)
                        }
                    })
                })
            })()
        </script>
    @endonce
@endpush