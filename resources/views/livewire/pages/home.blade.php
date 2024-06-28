<x-layouts.frontend>
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