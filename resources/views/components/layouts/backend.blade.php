<div @attributes(null, null, ['relative flex min-h-screen gap-3']) data-backend>
    <x-sidebars.backend>
        <header class="px-4 py-1">
            <a class="group flex items-center gap-2 w-fit focus:outline-none" href="{{ route('home') }}">
                <div class="relative hidden md:block">
                    <x-icons.logo class="w-20 h-16 duration-200 group-hover:animate-pulse group-hover:rotate-6 group-hover:scale-110 group-focus:animate-pulse group-focus:rotate-6 group-focus:scale-110" />
                    <span class="sr-only">Home</span>
                </div>
                <span class="font-poppins lowercase font-bold text-xl group-hover:text-primary dark:group-hover:text-primary-dark group-focus:text-primary dark:group-focus:text-primary-dark"><span class="font-light">Infinity:</span>UI</span>
            </a>
        </header>
        <nav class="p-4">
            <ul class="flex flex-col gap-2">
                <li>
                    <a href="{{ route('backend') }}" class="navlink p-4">
                        <x-icons.home class="w-6 h-6" />
                        <span class="ml-2">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('backend.pages') }}" class="navlink p-4">
                        <x-icons.globe-alt class="w-6 h-6" />
                        <span class="ml-2">Pages</span>
                    </a>
                </li>
            </ul>
        </nav>
    </x-sidebars.backend>
    <div class="flex flex-1 flex-col gap-3 p-3 pl-0">
        <x-header.frontend class="bg-white rounded-2xl shadow-lg p-1 dark:bg-black">
            <x-slot:left>
                <div class="flex gap-1 2xs:gap-3 py-2 w-fit">
                    <div class="hidden xs:flex items-center">
                        <x-buttons.search class="py-3 px-4" />
                        <x-modals.search />
                    </div>
                </div>
            </x-slot:left>
            <x-slot:right>
                <div class="flex gap-1 2xs:gap-3 py-2 w-fit">
    
                    <div class="flex items-center">
                        <x-dropdowns.darkmode />
                    </div>
    
                    <livewire:components.buttons.auth class="p-3" />
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
            </x-slot:right>
        </x-header.frontend>
    </div>
</div>