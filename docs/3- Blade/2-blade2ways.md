# Blade

Creamos el archivo **Layout.blade.php** en _/views_

```
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="/app.css">
</head>
<body>
    @yield('content')
</body>
</html>
```

Donde _@yield('content')_ representa un contenido

Implementamos el Layout en **post.blade.php**

```
@extends('layout')

@section('title')
    {{ $post->title }}
@endsection

@section('content')
    <article>
        <h1>
            {{ $post->title }}
        </h1>
        <div>
            {!! $post->body !!}
        </div>
    </article>
    <a href="/">Go Back</a>
@endsection
```

Implementamos el Layout en **posts.blade.php**

```
@extends('layout')

@section('title')
    My Blog
@endsection

@section('content')
    @foreach ($posts as $post)
        <article class="{{ $loop->even ? 'foobar' : '' }}">
            <h1>
                <a href="/posts/{{ $post->slug }}">
                    {{ $post->title }}
                </a>
            </h1>
            <div>
                {{ $post->excerpt }}
            </div>
        </article>
    @endforeach
@endsection
```

## Con componenetes

Creamos un carpeta _components_ y ahi podemos nuestros componentes como el _Layout_

Y en nuestras vistas lo llamamos de la siguiente manera

```
<x-layout>

    CODIGO_HTML

</x-layout>

```
