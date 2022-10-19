# Auth

Vamos a agregar una notificacio de success al UI

Modificamos el **RegisterController**

```
        return redirect('/')->with('success', 'Your account has been created');

```

Creamos un componente nuevo llamado **flash.blade.php**

```
@if (session()->has('success'))
    <div x-data="{show:true}" x-init="setTimeout(()=>show=false, 4000)" x-show="show"
        class="fixed bg-blue-500 text-white py-2 px-4 rounded-xl bottom-3 right-3 text-sm">
        <p>{{session('success')}}</p>
    </div>
@endif
```

Y lo usamos en nuestro **Layout.blade**

```
 <x-flash />
```
