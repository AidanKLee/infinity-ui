<div class="flex flex-col min-h-screen">
    <x-header.frontend>
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
                <button class="navlink relative" @click="$store.modals.open('auth')">
                    <div>
                        <x-icons.user class="w-7 h-7" />
                    </div>
                    <div class="flex flex-col sr-only text-left md:not-sr-only">
                        <span class="text-xs leading-tight whitespace-nowrap">Hi there,</span>
                        <span class="leading-tight whitespace-nowrap">Login / Register</span>
                    </div>
                </button>
                <x-modals.auth />
                <button class="group navlink relative xl:hidden">
                    <div class="flex flex-col justify-center items-end gap-1 w-7 md:w-[35px] h-full duration-200 group-active:scale-90 group-hover:gap-1.5 group-focus:gap-1.5">
                        <hr class="border-0 h-0.5 bg-black rounded-3xl w-full duration-200 group-hover:bg-primary group-focus:bg-primary dark:bg-white dark:group-hover:bg-primary-dark dark:group-focus:bg-primary-dark" />
                        <hr class="border-0 h-0.5 bg-black rounded-3xl w-3/4 duration-200 group-hover:w-full group-hover:bg-primary group-focus:w-full dark:bg-white group-focus:bg-primary dark:group-hover:bg-primary-dark dark:group-focus:bg-primary-dark"  />
                        <hr class="border-0 h-0.5 bg-black rounded-3xl w-1/2 duration-200 group-hover:w-full group-hover:bg-primary group-focus:w-full dark:bg-white group-focus:bg-primary dark:group-hover:bg-primary-dark dark:group-focus:bg-primary-dark"  />
                    </div>
                    <span class="sr-only">Menu</span>
                </button>
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
</div>