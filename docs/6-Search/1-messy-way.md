# Search

## Haciendo el search a pata

Modificamos el componente **\_posts-header.blade.php**
modificando el search

```
        <div class="relative flex lg:inline-flex items-center bg-gray-100 rounded-xl px-3 py-2">
            <form method="GET" action="#">
                <input type="text" name="search" placeholder="Find something"
                    class="bg-transparent placeholder-black font-semibold text-sm" value="{{request('search')}}">
            </form>
        </div>
```

Y luego modificamos la ruta para poder cargar las categorias en **web.php**

```
Route::get('categories/{category:slug}', function (Category $category) {
    return view('posts', [
        //'posts' => $category->posts->load(['category', 'author']),
        'posts' => $category->posts,
        'currentCategory' => $category,
        'categories' => Category::all()
    ]);
})->name('category');
```
