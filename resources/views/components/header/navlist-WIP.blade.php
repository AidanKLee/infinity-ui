<div class="navlist" x-data="navlist">
    @isset($title)
        <h2 class="sr-only">{{ $title }}</h2>
    @endisset
    <nav x-ref="navlist" class="container flex justify-between gap-1">
        <template x-for="([label, href], index) in visibleItems" :key="index">
            <a class="navlist-item" :href="href">
                <span class="block duration-200 whitespace-nowrap" x-text="label"></span>
            </a>
        </template>
        <div class="navlist-dropdown" x-show="overflowItems.length > 0">
            <button class="navlist-item" @click="toggleDropdown">
                <span class="block duration-200 whitespace-nowrap">More</span>
                <div class="duration-200" :class="{ 'rotate-180': dropdownOpen }">
                    <x-icons.chevron-down class="w-3 h-3" />
                </div>
            </button>
            <div x-show="dropdownOpen">
                <template x-for="([label, href], index) in overflowItems" :key="index">
                    <a class="navlist-item" :href="href">
                        <span class="block duration-200 whitespace-nowrap" x-text="label"></span>
                    </a>
                </template>
            </div>
        </div>
    </nav>
</div>

@push('scripts')
    @once
        <script>
            (function() {
                document.addEventListener('alpine:init', () => {
                    Alpine.data('navlist', () => ({
                        listItems: [
                            ['Home & Garden', '#'],
                            ['Hair & Beauty', '#'],
                            ['Consumer Electronics', '#'],
                            ['Clothing', '#'],
                            ['Toys & Games', '#'],
                            ['Furniture', '#'],
                            ['Sports & Entertainment', '#'],
                            ['Pet supplies', '#'],
                            ['Tools & Industrial', '#'],
                            ['Jewellery & Watches', '#'],
                            ['Automotive & Motorcycle', '#']
                        ],
                        visibleItems: [],
                        overflowItems: [],
    
                        init() {
                            this.visibleItems = [...this.listItems];
                            this.$nextTick(() => {
                                this.updateOverflow();
                                window.addEventListener('resize', this.updateOverflow.bind(this));
                            });
                        },
    
                        updateOverflow() {
                            this.$nextTick(() => {
                                const parentRect = this.$refs.navlist.getBoundingClientRect();
                                const dropdownButtonWidth = this.$refs.navlist.querySelector('.navlist-dropdown button').getBoundingClientRect().width;
    
                                let totalWidth = 0;
                                this.visibleItems = [];
                                this.overflowItems = [];
    
                                this.listItems.forEach(item => {
                                    const dummyElement = document.createElement('span');
                                    dummyElement.className = 'block duration-200 whitespace-nowrap';
                                    dummyElement.style.visibility = 'hidden';
                                    dummyElement.style.position = 'absolute';
                                    dummyElement.textContent = item[0];
                                    document.body.appendChild(dummyElement);
                                    const itemWidth = dummyElement.getBoundingClientRect().width;
                                    document.body.removeChild(dummyElement);
    
                                    if (totalWidth + itemWidth + dropdownButtonWidth > parentRect.width) {
                                        this.overflowItems.push(item);
                                    } else {
                                        totalWidth += itemWidth;
                                        this.visibleItems.push(item);
                                    }
                                });
                            });
                        },
    
                        toggleDropdown() {
                            this.dropdownOpen = !this.dropdownOpen;
                        }
                    }));
                });
            })()
        </script>
    @endonce
@endpush