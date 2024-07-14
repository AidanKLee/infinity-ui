<div @attributes(null, null, ['relative flex flex-col min-h-screen']) animate="fadeIn" animate-timeline="layout" animate-duration="2" data-smooth-scroll data-frontend>
    <x-header.frontend class="absolute z-[1] bg-gradient-to-r from-dark/2.5 to-dark/5 dark:from-light/2.5 dark:to-light/5" position="absolute">
        <x-slot name="left">
            <div class="flex items-stretch gap-8">
                <a class="group flex items-center gap-2 w-fit focus:outline-none" href="{{ route('home') }}">
                    <div class="relative hidden md:block">
                        <x-icons.logo class="w-20 h-16 duration-200 group-hover:animate-pulse group-hover:rotate-6 group-hover:scale-110 group-focus:animate-pulse group-focus:rotate-6 group-focus:scale-110" />
                        <span class="sr-only">Home</span>
                    </div>
                    <span class="font-poppins lowercase font-bold text-xl group-hover:text-primary dark:group-hover:text-primary-dark group-focus:text-primary dark:group-focus:text-primary-dark"><span class="font-light">Infinity:</span>UI</span>
                </a>
                <nav class="hidden xl:flex items-stretch justify-center gap-2 py-2 ">

                    <x-buttons.navlink>
                        Components

                        <x-slot name="dropdown">
                            <x-dropdowns.navlink class="w-96" x-show="show">
                                <ul class="flex flex-col gap-1 p-2">

                                    <x-dropdowns.items.navlink>
                                        <x-slot name="icon">
                                            <x-icons.wrench-screwdriver />
                                        </x-slot>
                                        <div>
                                            <a href="#" class="font-medium focus-none">
                                                <span>Buttons</span>
                                                <span class="absolute inset-0"></span>
                                            </a>
                                            <p class="text-xs font-light">A variety of buttons to suit your UI needs</p>
                                        </div>
                                    </x-dropdowns.items.navlink>

                                    <x-dropdowns.items.navlink>
                                        <x-slot name="icon">
                                            <x-icons.clipboard />
                                        </x-slot>
                                        <div>
                                            <a href="#" class="font-medium focus-none">
                                                <span>Form inputs</span>
                                                <span class="absolute inset-0"></span>
                                            </a>
                                            <p class="text-xs font-light">Enhance interaction: Form inputs redefined</p>
                                        </div>
                                    </x-dropdowns.items.navlink>

                                    <x-dropdowns.items.navlink>
                                        <x-slot name="icon">
                                            <x-icons.check-badge />
                                        </x-slot>
                                        <div>
                                            <a href="#" class="font-medium focus-none">
                                                <span>Badges</span>
                                                <span class="absolute inset-0"></span>
                                            </a>
                                            <p class="text-xs font-light">Elevate your site with UI badges that shine</p>
                                        </div>
                                    </x-dropdowns.items.navlink>

                                </ul>
                            </x-dropdowns.navlink>
                        </x-slot>

                    </x-buttons.navlink>

                    <x-buttons.navlink href="#">
                        Blocks
                    </x-buttons.navlink>

                    <x-buttons.navlink href="#">
                        Documentation
                    </x-buttons.navlink>

                </nav>
            </div>
        </x-slot>

        {{-- Used for a centre-aligned navigation menu
             <x-slot name="middle">
                <nav class="flex items-stretch justify-center py-2">
                    <x-buttons.navlink href="#" class="navlink">
                        Components
                    </x-buttons.navlink>
                </nav>
            </x-slot> 
        --}}

        <x-slot name="right">
            <div class="flex gap-1 2xs:gap-3 py-2 w-fit">
                <div class="hidden xs:flex items-center">
                    <x-buttons.search />
                    <x-modals.search />
                </div>

                <div class="flex items-center">
                    <x-dropdowns.darkmode />
                </div>

                <livewire:components.buttons.auth />
                <x-modals.auth class="layer-1" />

                <button class="group navlink relative xl:hidden" @click="$store.mobilemenu.open()">
                    <div class="flex flex-col justify-center items-end gap-1 w-7 md:w-[35px] h-full duration-200 group-active:scale-90 group-hover:gap-1.5 group-focus:gap-1.5">
                        <hr class="border-0 h-0.5 bg-black rounded-3xl w-full duration-200 group-hover:bg-primary group-focus:bg-primary dark:bg-white dark:group-hover:bg-primary-dark dark:group-focus:bg-primary-dark" />
                        <hr class="border-0 h-0.5 bg-black rounded-3xl w-3/4 duration-200 group-hover:w-full group-hover:bg-primary group-focus:w-full dark:bg-white group-focus:bg-primary dark:group-hover:bg-primary-dark dark:group-focus:bg-primary-dark"  />
                        <hr class="border-0 h-0.5 bg-black rounded-3xl w-1/2 duration-200 group-hover:w-full group-hover:bg-primary group-focus:w-full dark:bg-white group-focus:bg-primary dark:group-hover:bg-primary-dark dark:group-focus:bg-primary-dark"  />
                    </div>
                    <span class="sr-only">Menu</span>
                </button>
                <x-modals.mobile-menu x-show="$store.mobilemenu.show" @click.close="$store.mobilemenu.close()" @click.outside="$store.mobilemenu.close()" @keydown.window.esc="$store.mobilemenu.close()">
                    <x-slot:preheader>
                        <div class="flex flex-1 justify-start items-center px-2">
                            <a class="group flex items-center gap-2 w-fit focus:outline-none" href="{{ route('home') }}">
                                <div class="relative">
                                    <x-icons.logo class="w-16 h-12 duration-200 group-hover:animate-pulse group-hover:rotate-6 group-hover:scale-110 group-focus:animate-pulse group-focus:rotate-6 group-focus:scale-110" />
                                    <span class="sr-only">Home</span>
                                </div>
                                <span class="font-poppins lowercase font-bold text-xl group-hover:text-primary dark:group-hover:text-primary-dark group-focus:text-primary dark:group-focus:text-primary-dark"><span class="font-light">Infinity:</span>UI</span>
                            </a>
                        </div>
                    </x-slot:preheader>
                    <div class="px-2">
                        <livewire:components.buttons.auth full-width />
                        <nav class="flex flex-col items-stretch justify-center gap-2 py-2 ">

                            <x-buttons.navlink class="mobile-menu-navlink">
                                Components
        
                                <x-slot name="dropdown">
                                    <x-dropdowns.navlink class="w-full left-0" x-show="show">
                                        <ul class="flex flex-col gap-1 p-2">
        
                                            <x-dropdowns.items.navlink>
                                                <x-slot name="icon">
                                                    <x-icons.wrench-screwdriver />
                                                </x-slot>
                                                <div>
                                                    <a href="#" class="font-medium focus-none">
                                                        <span>Buttons</span>
                                                        <span class="absolute inset-0"></span>
                                                    </a>
                                                    <p class="text-xs font-light">A variety of buttons to suit your UI needs</p>
                                                </div>
                                            </x-dropdowns.items.navlink>
        
                                            <x-dropdowns.items.navlink>
                                                <x-slot name="icon">
                                                    <x-icons.clipboard />
                                                </x-slot>
                                                <div>
                                                    <a href="#" class="font-medium focus-none">
                                                        <span>Form inputs</span>
                                                        <span class="absolute inset-0"></span>
                                                    </a>
                                                    <p class="text-xs font-light">Enhance interaction: Form inputs redefined</p>
                                                </div>
                                            </x-dropdowns.items.navlink>
        
                                            <x-dropdowns.items.navlink>
                                                <x-slot name="icon">
                                                    <x-icons.check-badge />
                                                </x-slot>
                                                <div>
                                                    <a href="#" class="font-medium focus-none">
                                                        <span>Badges</span>
                                                        <span class="absolute inset-0"></span>
                                                    </a>
                                                    <p class="text-xs font-light">Elevate your site with UI badges that shine</p>
                                                </div>
                                            </x-dropdowns.items.navlink>
        
                                        </ul>
                                    </x-dropdowns.navlink>
                                </x-slot>
        
                            </x-buttons.navlink>
        
                            <x-buttons.navlink class="mobile-menu-navlink" href="#">
                                Blocks
                            </x-buttons.navlink>
        
                            <x-buttons.navlink class="mobile-menu-navlink" href="#">
                                Documentation
                            </x-buttons.navlink>
        
                        </nav>
                    </div>
                </x-modals.mobile-menu>
            </div>
        </x-slot>

        {{-- <x-header.navlist /> --}}
    </x-header.frontend>
    <main class="grow">
        @isset($slot)
            {{ $slot }}
        @endisset
    </main>
    <x-footer.frontend />

    <x-preloaders.frontend />
        
    <x-notifications.container animate="fadeIn" animate-timeline="layout" animate-duration="1">
        <x-notifications.toast icon="success" closeable index="0">
            <x-slot name="title">Successfully saved!</x-slot>
            Anyone with a link can now view this file.
        </x-notifications.toast>
        <x-notifications.toast icon="error" closeable index="1">
            <x-slot name="title">An error occurred!</x-slot>
            Something went wrong. Please try again.
        </x-notifications.toast>
        <x-notifications.toast icon="warning" closeable index="2">
            <x-slot name="title">There was a problem!</x-slot>
            Please check your internet connection.
        </x-notifications.toast>
        <x-notifications.toast icon="success" closeable index="0">
            <x-slot name="title">Successfully saved!</x-slot>
            Anyone with a link can now view this file.
        </x-notifications.toast>
        <x-notifications.toast icon="error" closeable index="1">
            <x-slot name="title">An error occurred!</x-slot>
            Something went wrong. Please try again.
        </x-notifications.toast>
        <x-notifications.toast icon="warning" closeable index="2">
            <x-slot name="title">There was a problem!</x-slot>
            Please check your internet connection.
        </x-notifications.toast>
        <x-notifications.toast icon="success" closeable>
            <x-slot name="title">Successfully saved!</x-slot>
            Anyone with a link can now view this file.
        </x-notifications.toast>
        <x-notifications.toast icon="error" closeable>
            <x-slot name="title">An error occurred!</x-slot>
            Something went wrong. Please try again.
        </x-notifications.toast>
        <x-notifications.toast icon="warning" closeable>
            <x-slot name="title">There was a problem!</x-slot>
            Please check your internet connection.
        </x-notifications.toast>
        <x-notifications.toast icon="info">
            <x-slot name="title">Receive notifications</x-slot>
            Notifications may include alerts, sounds, and badges.
            <x-slot name="actions">
                <button class="primary">Allow</button>
                <button class="danger" @click="close">Don't Allow</button>
                <a href="#"">Learn more</a>
            </x-slot>
        </x-notifications.toast>
    </x-notifications.container>
    @stack('notifications')
</div>