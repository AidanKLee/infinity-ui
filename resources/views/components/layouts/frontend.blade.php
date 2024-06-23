<div class="flex flex-col min-h-screen">
    <x-header.frontend>
        <x-slot name="left">
            <div class="flex items-stretch gap-8">
                <a class="group flex items-center gap-2 w-fit focus:outline-none" href="{{ route('home') }}">
                    <div>
                        <x-icons.logo class="w-20 h-16 duration-200 group-hover:animate-pulse group-hover:rotate-6 group-hover:scale-110 group-focus:animate-pulse group-focus:rotate-6 group-focus:scale-110" />
                        <span class="sr-only">Home</span>
                    </div>
                    <span class="font-poppins lowercase font-bold text-xl group-hover:text-primary dark:group-hover:text-primary-dark group-focus:text-primary dark:group-focus:text-primary-dark"><span class="font-light">Infinity:</span>UI</span>
                </a>
                <nav class="flex items-stretch justify-center gap-2 py-2">

                    <x-buttons.navlink>
                        Components

                        <x-slot name="dropdown">
                            <x-dropdowns.navlink x-show="open">

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
            <div class="flex gap-3 py-2">
                <div class="flex items-center">
                    <x-buttons.darkmode />
                </div>
                <div class="flex items-center">
                    <x-buttons.search />
                </div>
                <x-buttons.navlink href="#" class="navlink">
                    <div>
                        <x-icons.user class="w-7 h-7" />
                    </div>
                    <div class="flex flex-col">
                        <span class="text-xs leading-tight">Hi there,</span>
                        <span class="leading-tight">Login / Register</span>
                    </div>
                </x-buttons.navlink>
            </div>
        </x-slot>
    </x-header.frontend>
    <main class="grow">
        @isset($slot)
            {{ $slot }}
        @endisset
    </main>
    <x-footer.frontend />
</div>