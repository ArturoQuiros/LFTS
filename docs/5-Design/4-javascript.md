# Design

Importamos Alpine JS en el **layout.blade.php**

```
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
```

Modificamos las rutas en **web.php**

```
Route::get('authors/{author:username}', function (User $author) {
    return view('posts', [
        //'posts' => $author->posts->load(['category', 'author']),
        'posts' => $author->posts,
        'categories' => Category::all()
    ]);
});
```

Finalmente modificamos nuestro componente de header **\_posts-header.blade.php** para que cargue las categorias

```
            <div x-data="{show:false}" @click.away="show=false">
                <button @click="show=!show" class="py-2 pl-3 pr-9 text-sm font-semibold w-full lg:w-32 text-left flex lg:inline-flex">
                    {{isset($currentCategory) ? ucwords($currentCategory->name) : 'Categories'}}

                    <svg class="transform -rotate-90 absolute pointer-events-none" style="right: 12px;" width="22"
                        height="22" viewBox="0 0 22 22">
                        <g fill="none" fill-rule="evenodd">
                            <path stroke="#000" stroke-opacity=".012" stroke-width=".5" d="M21 1v20.16H.84V1z">
                            </path>
                            <path fill="#222"
                                d="M13.854 7.224l-3.847 3.856 3.847 3.856-1.184 1.184-5.04-5.04 5.04-5.04z"></path>
                        </g>
                    </svg>
                </button>

                <div x-show="show" class="py-2 absolute bg-gray-100 w-full mt-2 rounded-xl z-50" style="display: none">
                    <a href="/"
                        class="block text-left px-3 text-sm leading-5 hover:bg-blue-500 focus:bg-blue-500 hover:text-white focus:text-white">
                        All Categories
                    </a>
                    @foreach ($categories as $category)
                        <a href="/categories/{{$category->slug}}"
                            class="block text-left px-3 text-sm leading-5 hover:bg-blue-500 focus:bg-blue-500 hover:text-white focus:text-white
                            {{isset($currentCategory) && $currentCategory->id === $category->id ? 'bg-blue-500 text-white' : ''}}">
                            {{ucwords($category->name)}}
                        </a>
                    @endforeach

                </div>
            </div>
```
