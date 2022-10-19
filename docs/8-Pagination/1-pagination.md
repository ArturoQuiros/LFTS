# Paginacion

Apregamos paginacion para mejorar el rendimiento de nuestras busquedas

Modificamos el **PostController**

```
 return view('posts.index', [
            'posts' => Post::latest()->filter(request(['search', 'category', 'author']))->paginate(10)->withQueryString(),
        ]);
```

Y el **AppServiceProvider** para cargar _Tailwind_

```
 public function boot()
    {
        Paginator::useTailwind();
    }
```

Modificamos el dropdown de categorias

```
 @foreach ($categories as $category)
        <x-dropdown-item
            href="/?category={{$category->slug}}&{{http_build_query(request()->except('category', 'page'))}}"
            class="{{isset($currentCategory) && $currentCategory->id === $category->id ? 'bg-blue-500 text-white' : ''}}">
            {{ucwords($category->name)}}
        </x-dropdown-item>
    @endforeach
```

Y corremos el comando `php artisan vendor:publish --tag=laravel-pagination`
