# Filtering

Creamos un nuevo componente con el comando `php artisan make:component CategoryDropdown`

Modificamos el controlador de Post

```
return view('posts.index', [
            'posts' => Post::latest()->filter(request(['search', 'category']))->get(),
        ]);
```

Ahora, vamos a modificar la vista del componente en **CategoryDropdown.php**

```
public function render()
    {
        return view('components.category-dropdown', [
            'categories' => Category::all(),
            'currentCategory' => Category::firstWhere('slug', request('category'))
        ]);
    }
```

Y el archivo blade

```
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
```

En el header, ahora solo debemos llamar nuestro nuevo componente

```
<div class="relative lg:inline-flex bg-gray-100 rounded-xl">

            <x-category-dropdown />

        </div>
```

Creamos la carpeta de **views/Posts** y los archivos

-   index.blade.php
-   header.blade.php
-   show.blade.php:

Y finalmente modificamos las rutas para eliminar el filtro de categorias
