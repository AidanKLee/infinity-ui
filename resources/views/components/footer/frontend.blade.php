<footer class="bg-gradient-to-r from-dark/2.5 to-dark/5 dark:from-light/2.5 dark:to-light/5">
    <div class="container">
        <div class="grid lg:grid-cols-3 gap-16 py-16 sm:py-20 lg:py-32 3xl:py-40 3xl:gap-32">
                <div>
                    <a class="group flex items-center gap-2 w-fit focus:outline-none" href="{{ route('home') }}">
                        <div>
                            <x-icons.logo class="w-20 h-16 duration-200 group-hover:animate-pulse group-hover:rotate-6 group-hover:scale-110 group-focus:animate-pulse group-focus:rotate-6 group-focus:scale-110" />
                            <span class="sr-only">Home</span>
                        </div>
                        <span class="font-poppins lowercase font-bold text-xl group-hover:text-primary dark:group-hover:text-primary-dark group-focus:text-primary dark:group-focus:text-primary-dark"><span class="font-light">Infinity:</span>UI</span>
                    </a>
                    <p class="mt-6 text-sm font-light">Empower Your Interface with Our UI Component Framework: Craft Seamless, Swift, and Stunning User Experiences with Ease and Precision.</p>
                    <form class="flex flex-col gap-1 mt-8">
                        <h2 class="font-semibold">Subscribe to our newsletter</h2>
                        <div class="flex flex-col gap-x-4 gap-y-2 items-stretch max-w-md xl:flex-row">
                            <div class="grow">
                                <x-inputs.text id="email" label="Email" placeholder="Enter your email" floating prefix-inset>
                                    <x-slot name="prefix">
                                        <div>
                                            <label for="email" class="flex justify-center items-center h-[50px] w-[50px]">
                                                <x-icons.email class="w-5 h-5 text-dark/50 dark:text-light/50" />
                                            </label>
                                        </div>
                                    </x-slot>
                                </x-inputs.text>
                            </div>
                            <button class="btn primary w-full justify-center xl:w-fit">Subscribe</button>
                        </div>
                    </form>
                    <ul class="flex gap-2 mt-8">
                        <li class="relative flex-1 max-w-11 aspect p-2">
                            <a class="footer-link" href="#">
                                <x-icons.brands.facebook class="h-full w-full" />
                                <span class="sr-only">Facebook</span>
                                <span class="absolute inset-0"></span>
                            </a>
                        </li>
                        <li class="relative flex-1 max-w-11 aspect p-2">
                            <a class="footer-link" href="#">
                                <x-icons.brands.instagram class="h-full w-full" />
                                <span class="sr-only">Instagram</span>
                                <span class="absolute inset-0">
                            </a>
                        </li>
                        <li class="relative flex-1 max-w-11 aspect p-2">
                            <a class="footer-link" href="#">
                                <x-icons.brands.twitter class="h-full w-full" />
                                <span class="sr-only">X</span>
                                <span class="absolute inset-0">
                            </a>
                        </li>
                        <li class="relative flex-1 max-w-11 aspect p-2">
                            <a class="footer-link" href="#">
                                <x-icons.brands.youtube class="h-full w-full" />
                                <span class="sr-only">YouYube</span>
                                <span class="absolute inset-0">
                            </a>
                        </li>
                        <li class="relative flex-1 max-w-11 aspect p-2">
                            <a class="footer-link" href="#">
                                <x-icons.brands.tiktok class="h-full w-full" />
                                <span class="sr-only">TikTok</span>
                                <span class="absolute inset-0">
                            </a>
                        </li>
                        <li class="relative flex-1 max-w-11 aspect p-2">
                            <a class="footer-link" href="#">
                                <x-icons.brands.github class="h-full w-full" />
                                <span class="sr-only">GitHub</span>
                                <span class="absolute inset-0">
                            </a>
                        </li>
                    </ul>
                </div>
                <nav class="grid grid-cols-2 gap-x-8 gap-y-16 sm:grid-cols-4 lg:gap-16 lg:col-span-2 text-sm">
                    <div>
                        <h3 class="font-semibold">Solutions</h3>
                        <ul class="flex flex-col gap-6 mt-8 text-black/70 dark:text-white/70">
                            <li><a class="footer-link" href="#">Marketing</a></li>
                            <li><a class="footer-link" href="#">Analytics</a></li>
                            <li><a class="footer-link" href="#">Commerce</a></li>
                            <li><a class="footer-link" href="#">Insights</a></li>
                        </ul>
                    </div>
                    <div>
                        <h3 class="font-semibold">Support</h3>
                        <ul class="flex flex-col gap-6 mt-8 text-black/70 dark:text-white/70">
                            <li><a class="footer-link" href="#">Pricing</a></li>
                            <li><a class="footer-link" href="#">Documentation</a></li>
                            <li><a class="footer-link" href="#">Guides</a></li>
                            <li><a class="footer-link" href="#">API Status</a></li>
                        </ul>
                    </div>
                    <div>
                        <h3 class="font-semibold">Company</h3>
                        <ul class="flex flex-col gap-6 mt-8 text-black/70 dark:text-white/70">
                            <li><a class="footer-link" href="#">About</a></li>
                            <li><a class="footer-link" href="#">Blog</a></li>
                            <li><a class="footer-link" href="#">Jobs</a></li>
                            <li><a class="footer-link" href="#">Press</a></li>
                            <li><a class="footer-link" href="#">Partners</a></li>
                        </ul>
                    </div>
                    <div>
                        <h3 class="font-semibold">Legal</h3>
                        <ul class="flex flex-col gap-6 mt-8 text-black/70 dark:text-white/70">
                            <li><a class="footer-link" href="#">Claim</a></li>
                            <li><a class="footer-link" href="#">Privacy</a></li>
                            <li><a class="footer-link" href="#">Terms</a></li>
                        </ul>
                    </div>
                </nav>
            </div>
            <p class="py-8 border-t text-sm text-dark/70 border-dark/10 dark:border-light/10 dark:text-light/70">&copy; {{ now()->format('Y') }} Infinity UI. All rights reserved.</p>
        </div>
</footer>