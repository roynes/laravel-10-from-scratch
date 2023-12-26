<x-dropdown>
    <x-slot name="trigger">
        <button
            class="flex bg-transparent py-2 pl-3 pr-9 text-left text-sm font-semibold lg:inline-flex lg:w-32">
            {{ isset($currentCategory) ? ucwords($currentCategory->name) : 'Categories' }}
            <x-icon name="down-arrow" class="pointer-events-none absolute" style="right: 12px;" />
        </button>
    </x-slot>

    <x-dropdown-item href="/" :active="! isset($currentCategory)">
        All
    </x-dropdown-item>

    @foreach ($categories as $category)
        <x-dropdown-item 
            href="{{ 
                request()->mergeIfMissing(['category'=>$category->slug])
                         ->fullUrlWithoutQuery(['page']) 
            }}" 
            :active="isset($currentCategory) && $currentCategory->slug === $category->slug">
            {{ ucwords($category->name) }}
        </x-dropdown-item>
    @endforeach
</x-dropdown>