<x-dropdown>
    <x-slot name="trigger">
        <button class="py-2 pl-3 pr-9 text-sm font-semibold w-full lg:w-32 text-left flex lg:inline-flex">
            {{isset($currentCategory) ? ucwords($currentCategory->name) : 'Categories'}}
            
            <x-icon name="down-arrow" class="absolute pointer-events-none" />
        </button>
    </x-slot>

    <x-dropdown-item href="/" class="{{request()->routeIs('home') && !request('category') ? 'bg-blue-500 text-white' : ''}}" >All Categories</x-dropdown-item>
    @foreach ($categories as $category)
        <x-dropdown-item href="/?category={{$category->slug}}"
            class="{{isset($currentCategory) && $currentCategory->id === $category->id ? 'bg-blue-500 text-white' : ''}}">
            {{ucwords($category->name)}}
        </x-dropdown-item>
    @endforeach
</x-dropdown>