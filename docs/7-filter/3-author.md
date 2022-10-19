# Filter

Modificamos el **PostController** para agregar la refernecia al autor

```
            'posts' => Post::latest()->filter(request(['search', 'category', 'author']))->get(),

```

Modificamos el Modelo de **Post** para considerar el author con la categoria

```
  $query->when($filters['author'] ?? false, function ($query, $author) {
            $query->whereHas('author', fn ($query) =>
                $query->where('username', $author)
            );
        });
```

Modificamos las rutas **web.php** para que cargue los datos no del modelo sino del controlador

```
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

Route::get('/', [PostController::class, 'index'])->name('home');
Route::get('/posts/{post:slug}', [PostController::class, 'show'])->name('post'); //where, or whereAlpha, whereNumber, whereAlphaNumeric
```

Agregamos las referencias faltantes los componentes **post-card**, **post-featured-card** y **show** de modo que podamos filtrar por autor

```

    <h5 class="font-bold">
        <a href="/?author={{$post->author->username}}">{{$post->author->name}}</a>
    </h5>

```
