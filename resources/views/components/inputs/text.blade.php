<div x-data='input(@json($value ?? null), @json($maxlength ?? null), @json(isset($password)), @json((isset($growable)) && (isset($textarea))), @json(isset($select)), @json(isset($multiple)))' class="group relative flex flex-col" @click.outside="handleClickOutside" @keydown.window.esc="handleEscKeypress">
    @if(isset($label) && !isset($floating))
        <label @attributes(['id' => 'for'], null, [
            'block w-fit mb-1 opacity-70 text-sm',
        ])>{{ $label }}</label>
    @endif
    <div @class([
        'flex items-stretch rounded-md bg-white overflow-hidden border border-dark/10 focus-within:ring-2 focus-within:ring-primary dark:border-light/5 dark:bg-black dark:focus-within:ring-primary-dark',
        'group-focus-within:ring-2 group-focus-within:ring-primary dark:group-focus-within:ring-primary-dark' => $attributes->has('select'),
        'ring-2 ring-danger rounded-b-none' => isset($errors) && ($errors->has($attributes->get('wire:model') ?? ($attributes->get('name') ?? ''))),
    ]) :class="{ 'ring-2 ring-primary dark:ring-primary-dark': selectable && show }">
        @if (isset($prefix) && (!isset($floating) || (isset($prefixInset) && isset($floating))))
            {{ $prefix }}
        @endif
        <div class="group relative flex grow items-stretch">
            @isset($select)
                <input @class([
                    'peer input bg-transparent focus-none border-0 focus:ring-0 focus:text-dark/100 dark:focus:text-white/100',
                    'pt-5.5 pb-1 placeholder:opacity-0' => isset($floating),
                    'order-2' => isset($floating),
                    'pr-[50px]' => isset($password) && isset($floating),
                    'pr-[40px]' => isset($password) && !isset($floating),
                    'pl-0' => isset($prefix),
                    'pr-0' => isset($select),
                ])
                :class="{ 
                    'text-black/0 placeholder:text-black/0 dark:text-white/0 dark:placeholder:text-white/0': value.length,
                    'text-black/100 placeholder:text-black/40 dark:text-white/100 dark:placeholder:text-white/40': !value.length
                }"
                @input="handleSearchInput"
                @handleClick="handleClick"
                @focus="handleFocus"
                x-ref="search"
                autocomplete="off" placeholder="{{ $placeholder ?? '' }}" />
            @endisset
            @if(isset($textarea) && !isset($password))
                <textarea x-ref="input" @attributes(null, ['type', 'label', 'floating', 'maxlength', 'value', 'growable', 'textarea', 'prefix-inset', 'options'], [
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
            @elseif (!isset($select))
                <input id="{{ isset($select) ? '' : $id }}" x-ref="input" type="{{ isset($password) ? 'password' : 'text' }}" :type="password ? (show ? 'text' : 'password') : 'text'" 
                    @attributes(null, ['id', 'type', 'label', 'floating', 'maxlength', 'growable', 'password', 'prefix-inset', 'options'], [
                        'input bg-transparent focus-none border-0 focus:ring-0',
                        'peer pt-5.5 pb-1 placeholder:opacity-0' => isset($floating),
                        'order-2' => isset($floating),
                        'pr-[50px]' => isset($password) && isset($floating),
                        'pr-[40px]' => isset($password) && !isset($floating),
                        'pl-0' => isset($prefix),
                        'pr-0' => (isset($suffix) && !isset($password)),
                    ]){{ !isset($placeholder) && isset($floating) ? ' placeholder' : '' }} @input="handleInput($event);{{ $attributes->get('@input') ?? '' }}" />
            @elseif (isset($select))
                <div @class([
                    'input absolute top-0 truncate left-0 block bg-transparent pr-0 focus-none border-0 pointer-events-none focus:ring-0 peer-focus:hidden dark:bg-transparent',
                    'pt-5.5 pb-1 placeholder:opacity-0' => isset($floating),
                    'order-2' => isset($floating),
                    'pr-[50px]' => isset($password) && isset($floating),
                    'pr-[40px]' => isset($password) && !isset($floating),
                    'pl-0' => isset($prefix),
                ]) x-html="getSelectedInnerHTML()">

                </div>
            @endisset
            @if(isset($label) && isset($floating))
                <label @attributes(['id' => 'for'], null, [
                    'block w-fit mb-1 opacity-70',
                    'ml-2' => !isset($prefix) || !isset($prefixInset),
                    'ml-0' => isset($prefix) && isset($prefixInset),
                    'absolute pointer-events-none pt-[13px] duration-200 peer-disabled:opacity-20 group-focus-within:pt-1 group-focus-within:opacity-50 group-focus-within:text-xs peer-[:not(:placeholder-shown)]:pt-1 peer-[:not(:placeholder-shown)]:opacity-50 peer-[:not(:placeholder-shown)]:text-xs' => isset($floating),
                ]) :class="{ 
                    '!pt-1 !opacity-50 !text-xs' : selectable && (value.length || show)
                }">{{ $label }}</label>
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
            ]) :class="{ 'rotate-180': show }" @click="open">
                <x-icons.chevron-down class="w-3 h-3" />
            </label>
        @endisset
        @isset($suffix)
            {{ $suffix }}
        @endisset
    </div>
    @if(isset($select) && isset($options))
        <div class="select-dropdown" x-show="show" wire:ignore>
            <div x-ref="select-dropdown">
                @foreach($options as $option)
                    @if((isset($multiple) && !empty($option['value']) || !isset($multiple)))
                        <label class="select-option">
                            <input @attributes(null, ['type', 'label', 'floating', 'maxlength', 'value', 'growable', 'textarea', 'prefix-inset', 'options', 'select', 'multiple', 'value', 'placeholder', 'class', 'name', '@change'])
                                class="sr-only" 
                                type="{{ isset($multiple) ? 'checkbox' : 'radio' }}" 
                                value="{{ $option['value'] }}" 
                                name="{{ $name ?? ($attributes->get('wire:model') ?? ($id ?? '')) }}" 
                                @change="handleChange($event);{{ $attributes->get('@change') ?? '' }}" />
                            <div class="flex-1 truncate">
                                {!! $option['label'] !!}
                            </div>
                            <div x-show="(multiple && value.includes('{{ $option['value'] }}')) || (!multiple && value === '{{ $option['value'] }}')" style="display: none;">
                                <x-icons.check class="w-4 h-4 text-primary dark:text-primary-dark" />
                            </div>
                        </label>
                    @endif
                @endforeach
            </div>
            <div class="select-option" x-show="filteredOptions.length === 0">
                <div class="flex items-center gap-2">
                    <div>
                        <x-icons.warning class="h-4 w-4" />
                    </div>
                    <span>No results</span>
                </div>
            </div>
        </div>
    @endif
    @isset($errors)
        @error($attributes->has('wire:model') ? $attributes->get('wire:model') : ($name ?? 'test'))
            <div @class([
                'flex items-center justify-between gap-2 px-2 py-1 text-sm text-danger rounded-b-md border-2 border-transparent bg-danger/10 ring-2 ring-danger/10'
            ])>
                <span>{{ $message ?? 'There are errors with this field.' }}</span>
                @if ($attributes->has('wire:model'))
                    <button type="button" wire:click="dismissErrors('{{ $attributes->get('wire:model') }}')" class="focus-none">
                        <x-icons.cross class="w-4 h-4" />
                        <span class="sr-only">Clear error</span>
                    </button>
                @endif
            </div>
        @enderror
    @endif
    @isset($maxlength)
        <div @class(["text-2xs text-right mt-0.5"]) :class="{ 'text-danger': text.length > maxlength }" x-text="`${text.length} / ${maxlength}`"></div>
    @endisset
</div>

@push('scripts')
    @once
        <script>
            (function() {
                document.addEventListener('alpine:init', () => {
                    Alpine.data('input', (initialValue = null, maxlength = null, password = false, growable = false, selectable = false, multiple = false) => ({
                        filteredOptions: [],
                        growable: growable,
                        maxlength: maxlength,
                        multiple: multiple,
                        options: [],
                        password: password,
                        searchTerm: '',
                        selectable: selectable,
                        value: [],
                        show: false,
                        text: '',
                        init() {
                            if (this.$refs.input && this.$refs.input.value) {
                                this.text = this.$refs.input.value
                            }

                            if (growable) this.growTextarea()

                            if (selectable) {
                                this.options = Array.from(this.$refs['select-dropdown'].querySelectorAll('label')).map(element => {
                                    return { element, value: element.querySelector('[value]').getAttribute('value') }
                                })

                                this.filteredOptions = this.options

                                setTimeout(() => {
                                    if (multiple) {
                                        this.value = initialValue ?? 
                                            this.options.filter(option => option.element.querySelector('input').checked === true)
                                                .map(option => option.element.querySelector('input').value) ?? [],

                                        this.options.forEach(option => {
                                            if (this.value.map(value => value.toString()).includes(option.value.toString())) {
                                                option.element.querySelector('input').checked = true
                                            }
                                        })
                                    } else {
                                        this.value = initialValue ?? this.options.find(option => option.element.querySelector('input').checked === true)?.element?.querySelector('input')?.value ?? ''
                                        this.options.forEach(option => {
                                            if (this.value.toString() === option.value.toString()) {
                                                option.element.querySelector('input').checked = true
                                            }
                                        })
                                    }

                                    this.getSelectedInnerHTML()
                                }, 0)
                            }
                        },
                        close() {
                            this.show = false
                        },
                        getSelectedInnerHTML() {
                            return this.options.filter(option => (multiple ? this.value.map(value => value.toString()) : this.value.toString())
                                .includes(option.value.toString()) && option.value !== '')
                                .map(option => {
                                    let innerHTML = option.element.innerHTML
                                    let parser = new DOMParser()
                                    let doc = parser.parseFromString(innerHTML, 'text/html')

                                    doc.body.querySelectorAll('*').forEach(element => {
                                        if (!element.textContent.trim().length) {
                                            element.remove()
                                        }
                                    })

                                    doc.body.firstElementChild.removeAttribute('class')

                                    return doc.body.firstElementChild.innerHTML.trim()
                                })
                                .join(', ') ?? ''
                        },
                        growTextarea() {
                            this.$refs.input.style.height = ''
                            this.$refs.input.style.height = this.$refs.input.scrollHeight + 'px'
                        },
                        handleChange(e) {
                            if (multiple) {
                                if (e.target.checked) {
                                    this.value.push(e.target.value)
                                } else {
                                    this.value = this.value.filter(value => value !== e.target.value)
                                }
                            } else {
                                this.value = e.target.value

                                this.close()
                            }

                            // this.$refs.search.dispatchEvent(new InputEvent('input'))
                        },
                        handleClick(event) {
                            if (selectable) this.open();
                        },
                        handleClickOutside(event) {
                            if (selectable) this.close()
                        },
                        handleEscKeypress(event) {
                            if (selectable) this.close()
                        },
                        handleFocus(event) {
                            if (selectable) this.open();
                        },
                        handleInput(event) {
                            this.text = event.target.value
                            if (growable) this.growTextarea()
                        },
                        handleSearchInput(event) {
                            this.searchTerm = event.target.value;

                            const searchTerms = this.searchTerm.toLowerCase().split(' ').filter(term => term.length > 0);

                            if (searchTerms.length === 0) {
                                this.filteredOptions = this.options;
                                this.$refs['select-dropdown'].innerHTML = '';
                                this.filteredOptions.forEach(option => this.$refs['select-dropdown'].appendChild(option.element.cloneNode(true)));
                                return;
                            }

                            this.filteredOptions = this.options
                                .map(option => {
                                    const element = option.element.cloneNode(true);
                                    let matches = 0;


                                    searchTerms.forEach(term => {
                                        matches += this.highlightMatches(element, term)
                                    });

                                    return { ...option, element, matches };
                                })
                                .filter(option => option.matches > 0)
                                .sort((a, b) => b.matches - a.matches);

                            this.$refs['select-dropdown'].innerHTML = '';
                            this.filteredOptions.forEach(option => this.$refs['select-dropdown'].appendChild(option.element));
                        },
                        highlightMatches(element, term) {
                            const regex = new RegExp(`(${term})`, 'gi');
                            let matches = 0;

                            const walk = document.createTreeWalker(element, NodeFilter.SHOW_TEXT, null, false);
                            let node;

                            while (node = walk.nextNode()) {
                                const { nodeValue } = node;
                                if (regex.test(nodeValue)) {
                                    matches++;
                                    const span = document.createElement('span');
                                    span.innerHTML = nodeValue.replace(regex, '<span class="font-bold">$1</span>');
                                    node.replaceWith(...span.childNodes);
                                }
                            }
                            return matches;
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