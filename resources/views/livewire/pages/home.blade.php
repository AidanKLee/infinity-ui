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