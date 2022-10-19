# Auth

Creamos el Log In / Out

Modificamos el **RegisterController** para hacer el LogIn

```
$user = User::create($attributes);
        auth()->login($user);
```

Protegemos las rutas de LogIn y registro segun el estado con un _Middleware_ llamado _"guest"_

```
Route::get('/register', [RegisterController::class, 'create'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store'])->middleware('guest');
Route::post('/logout', [SessionsController::class, 'destroy']);
```

Modificamos el **Layout** para poder hacer LogIn o Registro según el estado de la autenticación

```
        <div class="mt-8 md:mt-0 flex items-center">
            @auth
                <span class="text-xs font-bold uppercase">Welcome, {{auth()->user()->name}}!</span>
                <form action="/logout" method="POST" class="text-xs font-semibold text-blue-500 ml-6">
                    @csrf
                    <button type="submit">Log Out</button>
                </form>
            @else
                <a href="/register" class="text-xs font-bold uppercase">Register</a>
                <a href="/login" class="ml-4 text-xs font-bold uppercase">Login</a>
            @endauth
            <a href="#" class="bg-blue-500 ml-3 rounded-full text-xs font-semibold text-white uppercase py-3 px-5">
                Subscribe for Updates
            </a>
        </div>
```

Creamos un nuevo controlador `php artisan make:controller SessionsController` para el manejo de las sesiones

```
public function destroy()
    {
        auth()->logout();
        return redirect('/')->with('success', 'Goodbye!');
    }
```
