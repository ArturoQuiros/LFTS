# Auth

Creamos el RegisterController `php artisan make:controller RegisterController`

Le agregamos dos funciones

```
    public function create()
    {
        return view('register.create');
    }

    public function store()
    {
        $attributes = request()->validate([
            'name' => 'required|max:255',
            'username' => 'required|max:255|min:3',
            'email' => 'required|email|max:255',
            'password' => 'required|min:8|max:255',
        ]);

        User::create($attributes);
        return redirect('/');

    }
```

Modificamos el modelo de **User**

```
    protected $guarded = [];
```

En **web.php** creamos un par de rutas

```
Route::get('/register', [RegisterController::class, 'create']);
Route::post('/register', [RegisterController::class, 'store']);
```

Finalmente la vista **create.blade.php**
