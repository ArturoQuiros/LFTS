# Blade

Primero cambiamos **posts.blade.php** a **post.php** para entender como funciona Blade y es que sin blade no podemos usar

```
{{ NUESTRO_CODIGO }}
```

Ahora, volvemos a poner la extension _.blade_

Y modificamos **posts.blade.php**

```
<body>
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
</body>
```

Y **post.blade.php**

```
    <article>
        <h1>
            {{ $post->title }}
        </h1>
        <div>
            {{!! $post->body !!}}
        </div>
    </article>
```
