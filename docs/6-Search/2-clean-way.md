# Search

## La forma facil

Creamos un controlador de **Post** `php artisan make:controller PostController`

Ajustamos nuestro controlador y creamos 2 funciones de _index_ y _show_

```
public function index()
    {

        return view('posts', [
            'posts' => Post::latest()->filter(request(['search']))->get(),
            'categories' => Category::all()
        ]);
    }

    public function show(Post $post)
    {
        return view('post', [
            'post' => $post,
        ]);
    }
```

Modificamos el modelo de **Post**

```
 public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, function ($query, $search) {
            $query->where('title', 'like', '%' . $search . '%')
            ->orWhere('excerpt', 'like', '%' . $search . '%')
            ->orWhere('body', 'like', '%' . $search . '%');
        });
    }
```
