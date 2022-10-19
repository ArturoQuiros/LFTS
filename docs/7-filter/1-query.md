# Filter

Modificamos el modelo de Posts y agregamos una funcion al query

```
        $query->when($filters['category'] ?? false, function ($query, $category) {
           $query->whereHas('category', fn ($query) =>
               $query->where('slug', $category)
           );
       });
```

Ahora modificamos el controlador incluyendo los modelos

```
use App\Models\Post;
use App\Models\Category;
```

Y modificamos el controlador para su uso

```
 return view('posts', [
            'posts' => Post::latest()->filter(request(['search', 'category']))->get(),
            'categories' => Category::all(),
            'currentCategory' => Category::firstWhere('slug', request('category'))
        ]);
```

Ajustamos el dropdpwn **\_posts-header.blade**

```
<x-dropdown-item href="/" class="{{request()->routeIs('home') && !request('category') ? 'bg-blue-500 text-white' : ''}}" >All Categories</x-dropdown-item>
                @foreach ($categories as $category)
                    <x-dropdown-item href="/?category={{$category->slug}}"
                        class="{{isset($currentCategory) && $currentCategory->id === $category->id ? 'bg-blue-500 text-white' : ''}}">
                        {{ucwords($category->name)}}
                    </x-dropdown-item>
                @endforeach
            </x-dropdown>
```

Y finalmente la ruta en **web.php**

```
Route::get('/', [PostController::class, 'index'])->name('home');
Route::get('/posts/{post:slug}', [PostController::class, 'show'])->name('post'); //where, or whereAlpha, whereNumber, whereAlphaNumeric

```
