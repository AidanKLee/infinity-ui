<div x-data="input({{ isset($maxlength) ? "$maxlength" : null }})" class="group relative flex flex-col">
    <input type="text" @attributes(null, ['type', 'label', 'floating', 'maxlength'], [
        'input',
        'peer pt-4.5 placeholder:opacity-0' => isset($floating),
        'order-2' => !isset($floating)
    ]){{ !isset($placeholder) && isset($floating) ? ' placeholder' : '' }} @input="handleInput" />
    @isset($label)
        <label @attributes(['id' => 'for'], null, [
            'block w-fit mb-1 opacity-70',
            'absolute pointer-events-none pt-3.5 ml-2 duration-200 peer-disabled:opacity-20 group-focus-within:pt-1 group-focus-within:opacity-50 group-focus-within:text-xs peer-[:not(:placeholder-shown)]:pt-1 peer-[:not(:placeholder-shown)]:opacity-50 peer-[:not(:placeholder-shown)]:text-xs' => isset($floating),
            'text-sm order-1' => !isset($floating),
        ])>{{ $label }}</label>
    @endisset
    @isset($maxlength)
        <div @class(["text-2xs text-right mt-0.5", 'order-3' => !isset($floating)]) :class="{ 'text-danger': text.length > maxlength }" x-text="`${text.length} / ${maxlength}`"></div>
    @endisset
</div>

@push('scripts')
    @once
        <script>
            (function() {
                document.addEventListener('alpine:init', () => {
                    Alpine.data('input', (maxlength = null) => ({
                        maxlength: maxlength,
                        text: '',
                        handleInput(event) {
                            this.text = event.target.value
                        }
                    }))
                })
            })()
        </script>
    @endonce
@endpush