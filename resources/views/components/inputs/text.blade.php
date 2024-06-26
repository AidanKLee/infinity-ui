<div x-data='input(@json($maxlength ?? null), @json(isset($password)), @json((isset($growable)) && (isset($textarea))), @json(isset($select)))' class="group relative flex flex-col" @click.outside="handleClickOutside">
    @if(isset($label) && !isset($floating))
        <label @attributes(['id' => 'for'], null, [
            'block w-fit mb-1 opacity-70 text-sm',
        ])>{{ $label }}</label>
    @endif
    <div @class([
        'flex items-stretch rounded-md bg-white overflow-hidden border border-dark/10 focus-within:ring-2 focus-within:ring-primary dark:border-light/5 dark:bg-black dark:focus-within:ring-primary-dark',
        'group-focus-within:ring-2 group-focus-within:ring-primary dark:group-focus-within:ring-primary-dark' => $attributes->has('select'),
        'ring-2 ring-danger rounded-b-none' => $errors->has($attributes->get('wire:model') ?? ($attributes->get('name') ?? '')),
    ])>
        @if (isset($prefix) && (!isset($floating) || (isset($prefixInset) && isset($floating))))
            {{ $prefix }}
        @endif
        <div class="group relative flex grow items-stretch">
            @if(isset($textarea) && !isset($password))
                <textarea x-ref="input" @attributes(null, ['type', 'label', 'floating', 'maxlength', 'value', 'growable', 'textarea', 'prefix-inset'], [
                    'input bg-transparent leading-snug focus-none border-0 focus:ring-0',
                    'peer pt-5.5 pb-1 placeholder:opacity-0' => isset($floating),
                    'order-2' => isset($floating),
                    'pl-0' => isset($prefix),
                    'pr-0' => isset($suffix) && !isset($password),
                    'h-[50px]' => isset($growable) && isset($floating),
                    'h-[40px]' => isset($growable) && !isset($floating),
                    'h-32' => !isset($growable)
                ]){{ !isset($placeholder) && isset($floating) ? ' placeholder' : '' }} @input="handleInput($event);{{ $attributes->get('@input') ?? '' }}"
                >{{ $value ?? '' }}</textarea>
            @else
                <input x-ref="input" type="{{ isset($password) ? 'password' : 'text' }}" :type="password ? (show ? 'text' : 'password') : 'text'" 
                    @attributes(null, ['type', 'label', 'floating', 'maxlength', 'growable', 'password', 'prefix-inset'], [
                        'input bg-transparent focus-none border-0 focus:ring-0',
                        'peer pt-5.5 pb-1 placeholder:opacity-0' => isset($floating),
                        'order-2' => isset($floating),
                        'pr-[50px]' => isset($password) && isset($floating),
                        'pr-[40px]' => isset($password) && !isset($floating),
                        'pl-0' => isset($prefix),
                        'pr-0' => (isset($suffix) && !isset($password)) || isset($select),
                    ]){{ !isset($placeholder) && isset($floating) ? ' placeholder' : '' }} @input="handleInput($event);{{ $attributes->get('@input') ?? '' }}" @focus="handleFocus($event);{{ $attributes->get('@focus') ?? '' }}" />
            @endisset
            @if(isset($label) && isset($floating))
                <label @attributes(['id' => 'for'], null, [
                    'block w-fit mb-1 opacity-70',
                    'ml-2' => !isset($prefix) || !isset($prefixInset),
                    'ml-0' => isset($prefix) && isset($prefixInset),
                    'absolute pointer-events-none pt-[13px] duration-200 peer-disabled:opacity-20 group-focus-within:pt-1 group-focus-within:opacity-50 group-focus-within:text-xs peer-[:not(:placeholder-shown)]:pt-1 peer-[:not(:placeholder-shown)]:opacity-50 peer-[:not(:placeholder-shown)]:text-xs' => isset($floating),
                ])>{{ $label }}</label>
            @endif
            @if (isset($prefix) && isset($floating) && !isset($prefixInset))
                <div @class([
                    'flex justify-center items-center order-1',
                    'duration-200 opacity-0 peer-focus:opacity-100 peer-[:not(:placeholder-shown)]:opacity-100'
                ])>
                    {{ $prefix }}
                </div>
            @endif
            @isset($password)
                <button type="button" @click="toggle" @class([
                    'flex items-center justify-center absolute right-0 bottom-0 text-dark/50 focus-none rounded-md focus:text-primary dark:text-light/50 dark:focus:text-primary-dark',
                    'h-[50px] w-[50px]' => isset($floating),
                    'h-[40px] w-[40px]' => !isset($floating),
                ])>
                    <x-icons.eye-open x-show="show" class="w-5 h-5" style="display: none;" />
                    <x-icons.eye-closed x-show="!show" class="w-5 h-5" />
                    <span class="sr-only" x-text="show ? 'Hide password' : 'Show password'"></span>
                </button>
            @endisset
        </div>
        @isset($select)
            <label @attributes(['id' => 'for']) @class([
                'flex justify-center items-center duration-200 text-dark/50 dark:text-light/50',
                'h-[50px] w-[50px]' => isset($floating),
                'h-[40px] w-[40px]' => !isset($floating),
            ]) :class="{ 'rotate-180': show }">
                <x-icons.chevron-down class="w-3 h-3" />
            </label>
        @endisset
        @isset($suffix)
            {{ $suffix }}
        @endisset
    </div>
    @isset($select)
        <div class="select-dropdown" x-ref="select-dropdown" x-show="show">
            {{ $slot }}
        </div>
    @endisset
    @error($attributes->get('wire:model') ?? ($attributes->get('name') ?? ''))
        <div @class([
            'px-2 py-1 text-sm text-danger rounded-b-md border-2 border-transparent bg-danger/10 ring-2 ring-danger/10'
        ])>
            {{ $message ?? 'There are errors with this field.' }}
        </div>
    @enderror
    @isset($maxlength)
        <div @class(["text-2xs text-right mt-0.5"]) :class="{ 'text-danger': text.length > maxlength }" x-text="`${text.length} / ${maxlength}`"></div>
    @endisset
</div>

@push('scripts')
    @once
        <script>
            (function() {
                document.addEventListener('alpine:init', () => {
                    Alpine.data('input', (maxlength = null, password = false, growable = false, selectable = false) => ({
                        growable: growable,
                        maxlength: maxlength,
                        password: password,
                        selectable: selectable,
                        show: false,
                        text: '',
                        init() {
                            if (this.$refs.input.value) {
                                this.text = this.$refs.input.value
                            }

                            if (growable) this.growTextarea()
                        },
                        close() {
                            this.show = false
                        },
                        growTextarea() {
                            this.$refs.input.style.height = ''
                            this.$refs.input.style.height = this.$refs.input.scrollHeight + 'px'
                        },
                        handleClickOutside(event) {
                            if (selectable) this.close()
                        },
                        handleFocus(event) {
                            if (selectable) this.open();
                        },
                        handleInput(event) {
                            this.text = event.target.value
                            if (growable) this.growTextarea()
                        },
                        open() {
                            this.show = true
                        },
                        toggle() {
                            this.show = !this.show
                            this.$refs.input.focus()
                        }
                    }))
                })
            })()
        </script>
    @endonce
@endpush