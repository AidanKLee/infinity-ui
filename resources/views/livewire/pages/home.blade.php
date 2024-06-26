<x-layouts.frontend>
    <div>
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
                <x-inputs.text id="categories" label="Categories" placeholder="Enter the categories" floating select>
                    <x-inputs.option type="button" value="1">Consumer Electronics</x-inputs.option>
                    <x-inputs.option type="button" value="2">Health & Beauty</x-inputs.option>
                    <x-inputs.option type="button" value="3">Home & Garden</x-inputs.option>
                    <x-inputs.option type="button" value="4">Toys & Hobbies</x-inputs.option>
                    <x-inputs.option type="button" value="5">Sports & Outdoors</x-inputs.option>
                    <x-inputs.option type="button" value="6">Automotive</x-inputs.option>
                    <x-inputs.option type="button" value="7">Fashion</x-inputs.option>
                    <x-inputs.option type="button" value="8">Jewelry & Watches</x-inputs.option>
                </x-inputs.text>
                {{-- <div>
                    <label class="label">Text input</label>
                    <input type="text" class="input" placeholder="Input">
                </div>
                <div>
                    <label class="label">Select</label>
                    <select class="input">
                            <option>Option 1</option>
                            <option>Option 2</option>
                            <option>Option 3</option>
                    </select>
                </div>
                <div>
                    <label class="label">Textarea</label>
                    <textarea class="input" placeholder="Textarea"></textarea>
                </div> --}}
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

    </div>
</x-layouts.frontend>