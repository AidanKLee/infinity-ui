<x-layouts.frontend>
    <section class="hero relative">
        <svg class="absolute inset-0 -z-10 h-full w-full stroke-primary/10 dark:stroke-primary-dark/10 [mask-image:radial-gradient(100%_100%_at_top_right,white,transparent)]" aria-hidden="true">
            <defs>
              <pattern id="983e3e4c-de6d-4c3f-8d64-b9761d1534cc" width="200" height="200" x="50%" y="-1" patternUnits="userSpaceOnUse">
                <path d="M.5 200V.5H200" fill="none" />
              </pattern>
            </defs>
            <rect width="100%" height="100%" stroke-width="0" fill="url(#983e3e4c-de6d-4c3f-8d64-b9761d1534cc)" />
        </svg>
        <div class="container font-poppins">
            <div class="max-w-4xl mx-auto text-center">
                <div animate="fadeDropTextIn" animate-duration="0.2" animate-stagger="0.02" animate-timeline="onload">
                    <p class="text-3xl font-light opacity-70">infinity:<span class="font-semibold">ui</span></p>
                    <h1 class="text-4xl font-semibold mt-5 md:text-7xl">Build Stunning Interfaces Effortlessly</h1>
                    <p class="text-lg mt-8 opacity-60">Discover a collection of premium UI components that speed up your development process.</p>
                </div>
                <div class="flex flex-col items-center gap-3 mt-10">
                    <a href="#" class="btn btn-lg font-lexend" animate="slideInLeft" animate-timeline="onload" animate-duration="0.5">Get Started</a>
                    <a href="#" class="btn btn-lg primary font-lexend" animate="slideInLeft" animate-timeline="onload" animate-duration="0.5">Browse Components</a>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="container">
            <div class="max-w-5xl mx-auto text-center">
                <p class="text-primary font-semibold dark:text-primary-dark" animate="fadeIn" animate-onscroll="tech">Powered by Leading Technologies</p>
                <h2 class="text-3xl font-semibold mt-4" animate="fadeIn" animate-onscroll="tech">Our Stack</h2>
                <p class="mt-8 text-lg opacity-60" animate="fadeDropTextIn" animate-onscroll="tech-content" animate-onscroll.end="top 50%">We leverage the latest technologies to deliver high-quality, efficient, and customizable UI components. Our stack is designed to enhance your development experience and provide you with the tools you need to create exceptional user interfaces.</p>
            </div>
            <x-lists.logo-list name="technologies" animate-onscroll.trigger="tech-list" animate-onscroll.start="top 100%" animate-onscroll.end="top 75%">
                <x-lists.logo-list-item name="tailwind" list="technologies" animate="fadeDropGrowIn" animate-onscroll="tech-list">
                    <x-icons.technologies.tailwind class="w-full h-full" />
                    <p class="sr-only">Tailwind CSS</p>
                    <x-slot:slide>
                        <h3 class="text-xl font-semibold opacity-60">Tailwind CSS</h3>
                        <p class="font-light">TailwindCSS is a utility-first CSS framework that provides low-level utility classes to build custom designs directly in your HTML. It enables developers to create responsive and modern web designs with minimal custom CSS, enhancing productivity by simplifying the styling process.</p>
                        <a href="https://tailwindcss.com/" target="_blank" class="link block w-fit ml-auto">Learn more</a>
                    </x-slot>
                </x-lists.logo-list-item>
                <x-lists.logo-list-item name="laravel" list="technologies" animate="fadeDropGrowIn" animate-onscroll="tech-list">
                    <x-icons.technologies.laravel class="w-full h-full" />
                    <p class="sr-only">Laravel</p>
                    <x-slot:slide>
                        <h3 class="text-xl font-semibold opacity-60">Laravel</h3>
                        <p class="font-light">Laravel is a free, open-source PHP web framework, created by Taylor Otwell and intended for the development of web applications following the model–view–controller architectural pattern. Laravel is known for its elegant syntax and is designed for building web applications with an expressive and elegant syntax.</p>
                        <a href="https://laravel.com/" target="_blank" class="link block w-fit ml-auto">Learn more</a>
                    </x-slot>
                </x-lists.logo-list-item>
                <x-lists.logo-list-item name="livewire" list="technologies" animate="fadeDropGrowIn" animate-onscroll="tech-list">
                    <x-icons.technologies.livewire class="w-full h-full" />
                    <p class="sr-only">Livewire</p>
                    <x-slot:slide>
                        <h3 class="text-xl font-semibold opacity-60">Livewire</h3>
                        <p class="font-light">Livewire is a full-stack framework for Laravel that makes building dynamic interfaces simple, without leaving the comfort of Laravel. Livewire relies on Blade, Laravel's templating engine, to render the HTML and manage the DOM, making it easy to build dynamic interfaces with Laravel.</p>
                        <a href="https://livewire.laravel.com/" target="_blank" class="link block w-fit ml-auto">Learn more</a>
                    </x-slot>
                </x-lists.logo-list-item>
                <x-lists.logo-list-item name="alpine" list="technologies" animate="fadeDropGrowIn" animate-onscroll="tech-list">
                    <x-icons.technologies.alpine class="w-full h-full dark:brightness-200" />
                    <p class="sr-only">Alpine.js</p>
                    <x-slot:slide>
                        <h3 class="text-xl font-semibold opacity-60">Alpine.js</h3>
                        <p class="font-light">Alpine.js offers you the reactive and declarative nature of big frameworks like Vue or React at a much lower cost. You get to keep your DOM, and sprinkle in behavior as you see fit. Alpine.js is a minimal framework for composing JavaScript behavior in your HTML.</p>
                        <a href="https://alpinejs.dev/" target="_blank" class="link block w-fit ml-auto">Learn more</a>
                    </x-slot>
                </x-lists.logo-list-item>
            </x-lists.logo-list>
        </div>
    </section>
    <section>
        <div class="container">
            <div class="max-w-screen-2xl mx-auto">
                <div class="max-w-5xl">
                    <p class="text-primary font-semibold dark:text-primary-dark" animate="fadeTextIn" animate-onscroll="metrics-1" animate-onscroll.start="top 100%" animate-onscroll.end="top 50%">Our Commitment to Excellence</p>
                    <h2 class="text-3xl font-semibold mt-4" animate="fadeTextIn" animate-onscroll="metrics-1">Building the Future of UI Development</h2>
                    <p class="mt-8 text-lg opacity-60">At <strong>Infinity UI</strong>, we are dedicated to revolutionizing the way developers create user interfaces. Our mission is to empower developers with high-quality, intuitive, and versatile UI components that accelerate development time and enhance user experiences. We believe in the power of innovation, collaboration, and continuous improvement to shape the future of web development.</p>
                </div>
                <ul class="metrics-list">
                    <li>
                        <p>50+</p>
                        <p>Customizable UI components</p>
                    </li>
                    <li>
                        <p>100+</p>
                        <p>Hours saved per project</p>
                    </li>
                    <li>
                        <p>99.9%</p>
                        <p>Code efficiency</p>
                    </li>
                    <li>
                        <p>1000+</p>
                        <p>Hours of development experience</p>
                    </li>
                </ul>
            </div>
        </div>
    </section>
    <section>
        <div class="container">
            <div class="max-w-4xl mx-auto text-center">
                <p class="text-primary font-semibold dark:text-primary-dark">Effortless, Elegant, Efficient</p>
                <h2 class="text-3xl font-semibold mt-4">Why choose our components?</h2>
                <p class="mt-8 text-lg opacity-60">Our UI components empower developers and designers with a perfect blend of aesthetics, functionality, and efficiency. Whether for a small project or a large-scale application, our components offer customization and ease of use. Discover how our elements can elevate your interface, reduce development time, and enhance the user experience.</p>
            </div>
            <ul class="grid gap-8 mt-20 font-light xl:gap-16 lg:grid-cols-3">
                <li class="flex-1 min-w-56">
                    <div class="p-2 w-fit bg-primary text-white rounded-md dark:bg-primary-dark dark:text-black">
                        <x-icons.bolt class="w-6 h-6" />
                    </div>
                    <h3 class="text-xl font-semibold mt-5">Speed & Efficiency</h3>
                    <p class="mt-1 opacity-60">Boost your development speed with pre-built, customizable components. Our library helps you get your project up and running quickly, allowing you to focus on delivering value to your users. Integrating our components into your workflow is seamless, saving you time without compromising on quality.</p>
                </li>
                <li class="flex-1 min-w-56">
                    <div class="p-2 w-fit bg-secondary text-white rounded-md dark:bg-secondary-dark dark:text-black">
                        <x-icons.check-badge class="w-6 h-6" />
                    </div>
                    <h3 class="text-xl font-semibold mt-5">Quality & Design</h3>
                    <p class="mt-1 opacity-60">Crafted with attention to detail for a professional and polished look. Our components meet high standards of design and functionality, performing optimally across all devices. By following best practices in UX/UI design, we provide components that enhance the user experience, making your applications more attractive and engaging.</p>
                </li>
                <li class="flex-1 min-w-56">
                    <div class="p-2 w-fit bg-tertiary text-white rounded-md dark:bg-tertiary-dark dark:text-black">
                        <x-icons.corner-down-left class="w-6 h-6" />
                    </div>
                    <h3 class="text-xl font-semibold mt-5">Flexibility</h3>
                    <p class="mt-1 opacity-60">Easily adaptable to fit your unique needs and branding. Our components are fully customizable, allowing you to tweak colors, adjust sizes, or modify behaviors to match your brand's identity. Our extensive documentation and support ensure you can make necessary adjustments effortlessly.</p>
                </li>
            </ul>
            <a href="#" class="btn btn-xl primary mt-20 mx-auto">
                <span>Learn more</span>
                <div class="-rotate-90">
                    <x-icons.arrow-down class="w-7 h-7 stroke-2" />
                </div>
            </a>
        </div>
    </section>
    <section class="coloured">
        <div class="container">
            <div class="max-w-4xl mx-auto text-center">
                <p class="text-primary font-semibold dark:text-primary-dark">Easy as 1-2-3</p>
                <h2 class="text-3xl font-semibold mt-4">How it works</h2>
                <p class="mt-8 text-lg opacity-60">Three Simple Steps to Stunning Interfaces.</p>
            </div>
            <ul class="progress-list-vertical flex flex-col mt-20 max-w-2xl mx-auto">
                <x-lists.progress-list-vertical-item>
                    <x-slot:icon>
                        <x-icons.library />
                    </x-slot:icon>
                    <x-slot:heading>1. Choose your Component</x-slot:heading>
                    Browse our extensive library and select the components that fit your project. Our collection features a wide range of options, from buttons to complex navigation bars, all designed to enhance your interface.
                </x-lists.progress-list-vertical-item>
                <x-lists.progress-list-vertical-item>
                    <x-slot:icon>
                        <x-icons.paintbrush />
                    </x-slot:icon>
                    <x-slot:heading>2. Customize</x-slot:heading>
                    Easily customize your chosen components to match your brand and design requirements. Our components are designed for flexibility, allowing you to adjust colors, sizes, and behaviors with ease.
                </x-lists.progress-list-vertical-item>
                <x-lists.progress-list-vertical-item>
                    <x-slot:icon>
                        <x-icons.code-bracket />
                    </x-slot:icon>
                    <x-slot:heading>3. Implement</x-slot:heading>
                    Integrate the components into your project with simple, straightforward code. Our detailed documentation and support resources guide you through the implementation process, ensuring a smooth integration.
                </x-lists.progress-list-vertical-item>
            </ul>
        </div>
    </section>
    <section class="coloured relative !pb-24">
        <div class="absolute inset-0 bg-gradient-to-b from-transparent to-white h-full w-full dark:to-black"></div>
        <div class="container relative">
            <div class="max-w-5xl mx-auto text-center">
                <p class="text-primary font-semibold dark:text-primary-dark">Flexible Plans for Every Developer</p>
                <h2 class="text-3xl font-semibold mt-4">Simple, Transparent Pricing</h2>
                <p class="mt-8 text-lg opacity-60">Choose the plan that fits your needs and unlock access to our comprehensive library of UI components, regular updates, and dedicated support. With our transparent pricing, you can focus on building exceptional user interfaces without worrying about hidden costs. Experience the flexibility and power of our components today, and elevate your development process to new heights.</p>
            </div>
            <ul class="max-w-7xl mx-auto grid gap-8 mt-20 font-poppins lg:grid-cols-3">
                <li class="flex flex-col p-6 bg-white border-2 border-white/10 rounded-2xl shadow-lg dark:bg-black dark:text-white">
                    <div class="grow">
                        <div class="flex flex-wrap items-center justify-between gap-2">
                            <h3 class="text-xl font-semibold">Starter</h3>
                        </div>
                        <p class="mt-6 text-sm opacity-60">Ideal for small projects</p>
                        <p class="mt-6 text-4xl font-semibold">£100</p>
                        <p class="mt-1 text-sm opacity-60">Single purchase license</p>
                        <p class="mt-6 text-sm font-semibold opacity-60">Everything you need to get started:</p>
                        <ul class="mt-10 text-left space-y-3">
                            <li class="flex items-center gap-4">
                                <div class="p-0.5 rounded-full bg-primary flex items-center justify-center dark:bg-primary-dark">
                                    <x-icons.check class="w-4 h-4 text-white stroke-2" />
                                </div>
                                <span>Access to 50+ components</span>
                            </li>
                            <li class="flex items-center gap-4">
                                <div class="p-0.5 rounded-full bg-primary flex items-center justify-center dark:bg-primary-dark">
                                    <x-icons.check class="w-4 h-4 text-white stroke-2" />
                                </div>
                                <span>Access for 1 user</span>
                            </li>
                        </ul>
                    </div>
                    <a href="#" class="btn btn-xl primary w-full justify-center mt-12">Get Started</a>
                </li>
                <li class="flex flex-col p-6 bg-white border-2 border-primary rounded-2xl shadow-lg dark:bg-black dark:text-white dark:border-primary-dark">
                    <div class="grow">
                        <div class="flex flex-wrap items-center justify-between gap-2">
                            <h3 class="text-xl font-semibold">Professional</h3>
                            <p class="badge rounded primary animate-pulse">Most popular</p>
                        </div>
                        <p class="mt-6 text-sm opacity-60">Best value for growing teams</p>
                        <p class="mt-6 text-4xl font-semibold">£250</p>
                        <p class="mt-1 text-sm opacity-60">Single purchase license</p>
                        <p class="mt-6 text-sm font-semibold opacity-60">Everything from the starter plan plus:</p>
                        <ul class="mt-10 text-left space-y-3">
                            <li class="flex items-center gap-4">
                                <div class="p-0.5 rounded-full bg-primary flex items-center justify-center dark:bg-primary-dark">
                                    <x-icons.check class="w-4 h-4 text-white stroke-2" />
                                </div>
                                <span>1 year of updates</span>
                            </li>
                            <li class="flex items-center gap-4">
                                <div class="p-0.5 rounded-full bg-primary flex items-center justify-center dark:bg-primary-dark">
                                    <x-icons.check class="w-4 h-4 text-white stroke-2" />
                                </div>
                                <span>Basic support</span>
                            </li>
                            <li class="flex items-center gap-4">
                                <div class="p-0.5 rounded-full bg-primary flex items-center justify-center dark:bg-primary-dark">
                                    <x-icons.check class="w-4 h-4 text-white stroke-2" />
                                </div>
                                <span>Access for up to 5 users</span>
                            </li>
                        </ul>
                    </div>
                    <a href="#" class="btn btn-xl primary w-full justify-center mt-12">Get Started</a>
                </li>
                <li class="flex flex-col p-6 text-white bg-primary border-2 border-primary rounded-2xl shadow-glow shadow-primary dark:bg-primary-dark dark:border-primary-dark dark:text-black dark:shadow-primary-dark">
                    <div class="grow">
                        <div class="flex flex-wrap items-center justify-between gap-2">
                            <h3 class="text-xl font-semibold">Enterprise</h3>
                        </div>
                        <p class="mt-6 text-sm opacity-80">For large-scale applications</p>
                        <p class="mt-6 text-4xl font-semibold">£1500</p>
                        <p class="mt-1 text-sm opacity-80">Single purchase license</p>
                        <p class="mt-6 text-sm font-semibold opacity-80">Everything from the professional plan plus:</p>
                        <ul class="mt-10 text-left space-y-3">
                            <li class="flex items-center gap-4">
                                <div class="p-0.5 rounded-full bg-white flex items-center justify-center dark:bg-black">
                                    <x-icons.check class="w-4 h-4 text-primary stroke-2 dark:text-primary-dark" />
                                </div>
                                <span>Exclusive components</span>
                            </li>
                            <li class="flex items-center gap-4">
                                <div class="p-0.5 rounded-full bg-white flex items-center justify-center dark:bg-black">
                                    <x-icons.check class="w-4 h-4 text-primary stroke-2 dark:text-primary-dark" />
                                </div>
                                <span>5 years of updates</span>
                            </li>
                            <li class="flex items-center gap-4">
                                <div class="p-0.5 rounded-full bg-white flex items-center justify-center dark:bg-black">
                                    <x-icons.check class="w-4 h-4 text-primary stroke-2 dark:text-primary-dark" />
                                </div>
                                <span>Premium support</span>
                            </li>
                            <li class="flex items-center gap-4">
                                <div class="p-0.5 rounded-full bg-white flex items-center justify-center dark:bg-black">
                                    <x-icons.check class="w-4 h-4 text-primary stroke-2 dark:text-primary-dark" />
                                </div>
                                <span>Access for up to 15 users</span>
                            </li>
                        </ul>
                    </div>
                    <a href="#" class="btn btn-xl text-primary w-full justify-center mt-12 dark:text-primary-dark">Get Started</a>
                </li>
            </ul>
        </div>
    </section>
    <section>
        <div class="container">
            <div class="max-w-5xl mx-auto">
                <p class="text-primary font-semibold dark:text-primary-dark">Empower Your Experience</p>
                <h2 class="text-3xl font-semibold mt-4">Got Questions? We’ve Got Answers!</h2>
                <ul class="accordion-list mt-12">
                    <x-dropdowns.accordion>
                        <x-slot:header>What are the advantages of using UI components in web development?</x-slot:header>
                        UI components provide modular, reusable building blocks that streamline development, ensure consistency across the application, and enhance maintainability. They also facilitate faster prototyping and easier collaboration among team members.
                    </x-dropdowns.accordion>
                    <x-dropdowns.accordion>
                        <x-slot:header>How can I ensure consistency when using UI components across different pages or applications?</x-slot:header>
                        Consistency can be ensured by establishing design guidelines and using a centralized UI component library. By adhering to these guidelines and reusing components with consistent styling and behavior, developers can maintain a unified look and feel throughout the application.
                    </x-dropdowns.accordion>
                    <x-dropdowns.accordion>
                        <x-slot:header>What are some best practices for optimizing UI component performance?</x-slot:header>
                            Optimizing UI component performance involves minimizing render times, reducing unnecessary re-renders, and optimizing asset sizes. Techniques such as lazy loading, code splitting, and caching can also improve performance by reducing load times and enhancing user experience.
                    </x-dropdowns.accordion>
                    <x-dropdowns.accordion>
                        <x-slot:header>What are some common types of UI components used in web development?</x-slot:header>
                        Common types of UI components include buttons, forms, modals, navigation bars, cards, dropdowns, and sliders. These components help structure and organize content, provide interactive elements, and enhance the overall user experience.
                    </x-dropdowns.accordion>
                    <x-dropdowns.accordion>
                        <x-slot:header>How can UI components improve the accessibility of a web application?</x-slot:header>
                        UI components can improve accessibility by following best practices such as using semantic HTML, ensuring keyboard navigability, providing sufficient color contrast, and including ARIA (Accessible Rich Internet Applications) attributes. This ensures that all users, including those with disabilities, can interact with the application effectively.
                    </x-dropdowns.accordion>
                </ul>
            </div>
        </div>
    </section>
    <section>
        <div class="container">
            <div class="max-w-4xl mx-auto text-center">
                <p class="text-primary font-semibold dark:text-primary-dark">Enhance Your Interface Effortlessly</p>
                <h2 class="text-3xl font-semibold md:text-5xl mt-4">Ready to Transform Your UI?</h2>
                <p class="mt-8 text-lg opacity-60">Discover the power of our UI components to create stunning, user-friendly interfaces. Whether you’re starting a new project or looking to enhance an existing one, our components are designed to streamline your workflow and elevate your design. Take the next step towards exceptional user experiences with our intuitive tools and extensive library of customizable elements.</p>
                <div class="flex flex-col items-center gap-3 mt-10">
                    <a href="#" class="btn btn-lg font-lexend">Sign Up</a>
                    <a href="#" class="btn btn-lg primary font-lexend">Contact Us</a>
                </div>
            </div>
        </div>
    </section>
    <section class="relative">
        <img src="{{ asset('assets/images/samples/backdrop.jpg') }}" alt="Laptop and mobile" class="absolute z-[1] inset-0 object-cover w-full h-full mix-blend-exclusion opacity-50" />
        <div class="absolute z-[2] inset-0 bg-gradient-to-b from-white to-transparent h-full w-full dark:from-black"></div>
        <div class="container relative z-[3]">
            <div class="max-w-4xl mx-auto text-center">
                <p class="text-primary font-semibold dark:text-primary-dark">Explore and Innovate</p>
                <h2 class="text-3xl font-semibold mt-4">Latest Insights and Tutorials</h2>
            </div>
            <ul class="blog-list">
                <x-lists.blog-list-item href="#" :src="asset('assets/images/samples/blog/ui.jpg')" alt="Laptop and mobile">
                    <x-slot:prefix>Stay Ahead in UI</x-slot:prefix>
                    <x-slot:category>Industry Trends</x-slot:category>
                    <x-slot:heading>Top 5 UI Design Trends for 2024</x-slot:heading>
                    Stay ahead of the curve with the latest UI design trends. Discover the top five trends that are shaping the future of user interfaces in 2024 and learn how to implement them in your projects.
                    <x-slot:date>July 1, 2024</x-slot:date>
                </x-lists.blog-list-item>
                <x-lists.blog-list-item href="#" :src="asset('assets/images/samples/blog/code.jpg')" alt="Laptop and mobile">
                    <x-slot:prefix>Customize with Ease</x-slot:prefix>
                    <x-slot:category>Beginner Guides</x-slot:category>
                    <x-slot:heading>How to Customize Our Button Components for Your Brand</x-slot:heading>
                    Creating buttons that match your brand's identity has never been easier. Follow our step-by-step guide to customize our button components and enhance your application's visual appeal.
                    <x-slot:date>June 25, 2024</x-slot:date>
                </x-lists.blog-list-item>
                <x-lists.blog-list-item href="#" :src="asset('assets/images/samples/blog/digital-globe.jpg')" alt="Laptop and mobile">
                    <x-slot:prefix>Enhance Navigation</x-slot:prefix>
                    <x-slot:category>Best Practices</x-slot:category>
                    <x-slot:heading>Improving User Experience with Our Navigation Bars</x-slot:heading>
                    Navigation bars are crucial for guiding users through your application. Learn how our customizable navigation bar components can improve user experience with intuitive and responsive designs.
                    <x-slot:date>June 21, 2024</x-slot:date>
                </x-lists.blog-list-item>
            </ul>
        </div>
    </section>
    {{-- <div>
        <div class="container flex flex-col gap-2 py-4">
        
            <div class="badge dot rounded">Badge</div>
            <div class="badge dot rounded primary">Badge</div>
            <div class="badge dot rounded secondary">Badge</div>
            <div class="badge dot rounded tertiary">Badge</div>
            <div class="badge dot rounded info">Badge</div>
            <div class="badge dot rounded warning">Badge</div>
            <div class="badge dot rounded danger">Badge</div>
        
            <div class="flex flex-col gap-2 max-w-md">
                <x-inputs.text id="firstname" label="First name" placeholder="Enter your first name" maxlength="255" floating />
                <x-inputs.text id="email" label="Email" placeholder="Enter your email" floating prefix-inset>
                    <x-slot name="prefix">
                        <label for="email" class="flex justify-center items-center h-[50px] w-[50px]">
                            <x-icons.email class="w-5 h-5 text-dark/50 dark:text-light/50" />
                        </label>
                    </x-slot>
                    <x-slot name="suffix">
                        <label for="email" class="flex justify-center items-center px-2 text-sm text-danger">
                            Required
                        </label>
                    </x-slot>
                </x-inputs.text>
                <x-inputs.text id="website" label="Website" placeholder="Enter your website" floating>
                    <x-slot name="prefix">
                        <label for="website" class="flex justify-center pl-2 pt-5.5 pb-1">
                            https://
                        </label>
                    </x-slot>
                </x-inputs.text>
                <x-inputs.text id="price" label="Price" placeholder="Enter the price" floating>
                    <x-slot name="prefix">
                        <label for="price" class="flex justify-center pl-2 pt-5.5 pb-1">
                            £
                        </label>
                    </x-slot>
                </x-inputs.text>
                <x-inputs.text id="password" label="Password" placeholder="Enter your password" floating password />
                <x-inputs.text id="description" label="Description" placeholder="Enter the description" maxlength="1024" floating textarea prefix-inset growable>
                    <x-slot name="prefix">
                        <label for="description" class="flex justify-center items-center h-[50px] w-[50px]">
                            <x-icons.pencil class="w-5 h-5 text-dark/50 dark:text-light/50" />
                        </label>
                    </x-slot>
                </x-inputs.text>
                <x-inputs.text id="categories" label="Categories" placeholder="Select the category" select :options="[
                    ['value' => '', 'label' => 'No category'],
                    ['value' => 1, 'label' => 'Consumer Electronics'],
                    ['value' => 2, 'label' => 'Health & Beauty'],
                    ['value' => 3, 'label' => 'Home & Garden'],
                    ['value' => 4, 'label' => 'Toys & Hobbies'],
                    ['value' => 5, 'label' => 'Sports & Outdoors'],
                    ['value' => 6, 'label' => 'Automotive'],
                    ['value' => 7, 'label' => 'Fashion'],
                    ['value' => 8, 'label' => 'Jewelry & Watches'],
                ]" floating prefix-inset>
                    <x-slot name="prefix">
                        <label for="categories" class="flex justify-center items-center h-[50px] w-[50px]">
                            <x-icons.tag class="w-5 h-5 text-dark/50 dark:text-light/50" />
                        </label>
                    </x-slot>
                </x-inputs.text>
                <x-inputs.text id="sub-categories" label="Subcategories" placeholder="Select the subcategories" select :options="[
                    ['value' => 1, 'label' => 'Consumer Electronics'],
                    ['value' => 2, 'label' => 'Health & Beauty'],
                    ['value' => 3, 'label' => 'Home & Garden'],
                    ['value' => 4, 'label' => 'Toys & Hobbies'],
                    ['value' => 5, 'label' => 'Sports & Outdoors'],
                    ['value' => 6, 'label' => 'Automotive'],
                    ['value' => 7, 'label' => 'Fashion'],
                    ['value' => 8, 'label' => 'Jewelry & Watches'],
                ]" floating multiple />
            </div>
        
            <button class="btn btn-2xl !text-2xl" @click="test">Click me</button>
            <button class="btn btn-xl" @click="test">Click me</button>
            <button class="btn btn-lg">Click me</button>
            <button class="btn">Click me</button>
            <button class="btn btn-sm">Click me</button>
            <button class="btn btn-xs">Click me</button>
            <button class="btn btn-2xs">Click me</button>
        
            <div class="btn-group">
                <button class="btn">Click me</button>
                <button class="btn primary">Click me</button>
                <button class="btn secondary">Click me</button>
            </div>

        </div>
    </div> --}}
</x-layouts.frontend>