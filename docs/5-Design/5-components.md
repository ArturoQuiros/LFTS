# Design

Creamos unos nuevos componentes

**dropdown-item.blade.php**

```
<a {{$attributes(['class' => "block text-left px-3 text-sm leading-5 hover:bg-blue-500 focus:bg-blue-500 hover:text-white focus:text-white"])}}>
    {{$slot}}
</a>
```

**dropdown.blade.php**

```
@props(['trigger'])

<div x-data="{show:false}" @click.away="show=false">

    <div @click="show=!show">
        {{$trigger}}
    </div>

    <div x-show="show" class="py-2 absolute bg-gray-100 w-full mt-2 rounded-xl z-50" style="display: none">
        {{$slot}}
    </div>
</div>
```

**icon.blade.php**

```
@props(['name'])

@if ($name === 'down-arrow')
    <svg {{$attributes(['class' => "transform -rotate-90"])}} style="right: 12px;" width="22"
        height="22" viewBox="0 0 22 22">
        <g fill="none" fill-rule="evenodd">
            <path stroke="#000" stroke-opacity=".012" stroke-width=".5" d="M21 1v20.16H.84V1z">
            </path>
            <path fill="#222"
                d="M13.854 7.224l-3.847 3.856 3.847 3.856-1.184 1.184-5.04-5.04 5.04-5.04z"></path>
        </g>
    </svg>
@endif
```

Modificamos el header en **\_posts-header.blade.php** para usar nuestros nuevos componentes

````
 <x-dropdown>
                <x-slot name="trigger">
                    <button class="py-2 pl-3 pr-9 text-sm font-semibold w-full lg:w-32 text-left flex lg:inline-flex">
                        {{isset($currentCategory) ? ucwords($currentCategory->name) : 'Categories'}}

                        <x-icon name="down-arrow" class="absolute pointer-events-none" />
                    </button>
                </x-slot>

                <x-dropdown-item href="/" class="{{request()->routeIs('home') ? 'bg-blue-500 text-white' : ''}}" >All Categories</x-dropdown-item>
                @foreach ($categories as $category)
                    <x-dropdown-item href="/categories/{{$category->slug}}"
                        class="{{isset($currentCategory) && $currentCategory->id === $category->id ? 'bg-blue-500 text-white' : ''}}">
                        {{ucwords($category->name)}}
                    </x-dropdown-item>
                @endforeach
            </x-dropdown>
            ```
````
