# Auth

Haciendo la pagina de Log In

Primero debemos preparar el **SessionsController** con las funciones _create_ y _store_

```
    public function create()
    {
        return view('sessions.create');
    }

    public function store()
    {
        $attributes = request()->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required',
        ]);

        if(auth()->attempt($attributes)){
            return redirect('/')->with('success', 'Welcome back!');
        }

        //throw ValidationException::withMessages(['password' => 'Your provided credentials are incorrect']);
        return back()->withInput()->withErrors(['password' => 'Your provided credentials are incorrect']);

    }
```

Luego modificamos las rutas en **web.php**

```
Route::get('/login', [SessionsController::class, 'create'])->middleware('guest');
Route::post('/login', [SessionsController::class, 'store'])->middleware('guest');
Route::post('/logout', [SessionsController::class, 'destroy'])->middleware('auth');
```

Y ahora si, modificamos la vista **create** con su _form_

```
    <h1 class="text-center font-bold text-xl">Log In</h1>
    <form method="POST" action="/login" class="mt-10">
        @csrf
        <div class="mb-6">
            <label for="email" class="block mb-2 uppercase font-bold text-xs text-gray-700">Email</label>
            <input type="email" name="email" id="email" class="border border-gray-400 p-2 w-full" value="{{old('email')}}" required>
            @error('email')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
            @enderror
        </div>
        <div class="mb-6">
            <label for="password" class="block mb-2 uppercase font-bold text-xs text-gray-700">Password</label>
            <input type="password" name="password" id="password" class="border border-gray-400 p-2 w-full" required>
            @error('password')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
            @enderror
        </div>
        <div class="mb-6">
            <button type="submit" class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500">Submit</button>
        </div
        {{-- @if ($errors->any())
            <ul>
                @foreach ($errors->all() as $error)
                    <li class="text-red-500 text-xs">{{$error}}</li>
                @endforeach
            </ul>
        @endif --}}
    </form>
```
