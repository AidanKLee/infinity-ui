<div x-data="input({{ isset($maxlength) ? "$maxlength" : 'null' }}, {{ isset($password) ? 'true' : 'false' }})" class="group relative flex flex-col">
    <input x-ref="input" type="{{ isset($password) ? 'password' : 'text' }}" :type="show ? 'text' : 'password'" 
        @attributes(null, ['type', 'label', 'floating', 'maxlength', 'type'], [
            'input',
            'peer pt-4.5 placeholder:opacity-0' => isset($floating),
            'order-2' => !isset($floating),
            'pr-[52px]' => isset($password) && isset($floating),
        ]){{ !isset($placeholder) && isset($floating) ? ' placeholder' : '' }} @input="handleInput($event);{{ $attributes->get('@click') ?? '' }}" />
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
    @isset($password)
        <button type="button" @click="togglePassword" @class([
            'flex items-center justify-center absolute right-0 bottom-0 text-dark/50 focus-none rounded-md focus:ring-2 focus:ring-primary focus:text-primary dark:text-light/50 dark:focus:ring-primary-dark dark:focus:text-primary-dark',
            'h-[52px] w-[52px]' => isset($floating),
            'h-[42px] w-[42px]' => !isset($floating),
        ])>
            <x-icons.eye-open x-show="show" class="w-5 h-5" style="display: none;" />
            <x-icons.eye-closed x-show="!show" class="w-5 h-5" />
            <span class="sr-only" x-text="show ? 'Hide password' : 'Show password'"></span>
        </button>
    @endisset
</div>

@push('scripts')
    @once
        <script>
            (function() {
                document.addEventListener('alpine:init', () => {
                    Alpine.data('input', (maxlength = null, password = false) => ({
                        maxlength: maxlength,
                        show: !password,
                        text: '',
                        handleInput(event) {
                            this.text = event.target.value
                        },
                        togglePassword() {
                            this.show = !this.show
                            this.$refs.input.focus()
                        }
                    }))
                })
            })()
        </script>
    @endonce
@endpush