# Auth

Agregamos validaciones a nuestro formulario de registro

Modificamos el **RegisterController**

```
$attributes = request()->validate([
            'name' => 'required|max:255',
            'username' => ['required', 'min:3', 'max:255', Rule::unique('users', 'username')],
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|min:8|max:255',
        ]);
```

Y agregamos las validaciones en la vista **create.blade**

```
    @error('NOMBRE_PARAMETRO')
        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
    @enderror
```

Y verificar si hay errores en general

```
 {{-- @if ($errors->any())
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li class="text-red-500 text-xs">{{$error}}</li>
                        @endforeach
                    </ul>
                @endif --}}
```
