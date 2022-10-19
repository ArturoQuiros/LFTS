# Filter

Debido a las modificaciones que hicimos, el filtro de categorias no funciona bien por lo que modificamos el componente
**category-dropdown.blade.php**

```
 <x-dropdown-item
            href="/?category={{$category->slug}}&{{http_build_query(request()->except('category'))}}"
            class="{{isset($currentCategory) && $currentCategory->id === $category->id ? 'bg-blue-500 text-white' : ''}}">
            {{ucwords($category->name)}}
        </x-dropdown-item>
```

Y **header.blade.php**

```
<form method="GET" action="/">
                @if (request('category'))
                    <input type="hidden" name="category" value="{{request('category')}}">
                @endif
                <input type="text" name="search" placeholder="Find something"
                    class="bg-transparent placeholder-black font-semibold text-sm" value="{{request('search')}}">
            </form>
```
