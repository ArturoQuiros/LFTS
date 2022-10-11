# BD

Modificamos el modelo de **Category** para mantener la relacion Post-Categoria

```
    public function posts()
    {
        return $this->hasMany(Post::class);
    }

```

Y modificamos la ruta en **web.php**

```
Route::get('/posts/{post:slug}', function (Post $post) {
    return view('post', [
        'post' => $post,
    ]);
});

Route::get('categories/{category:slug}', function (Category $category) {
    return view('posts', [
        'posts' => $category->posts,
    ]);
});
```

Modificamos la vista de **posts**

```
<article class="{{ $loop->even ? 'foobar' : '' }}">
            <h1>
                <a href="/posts/{{ $post->slug }}">
                    {{ $post->title }}
                </a>
            </h1>
            <p>
                <a href="/categories/{{$post->category->slug}}">{{$post->category->name}}</a>
            </p>
            <div>
                {{ $post->excerpt }}
            </div>
        </article>
```

Modificamso la vista de **post**

```
 <article>
        <h1>
            {{ $post->title }}
        </h1>
        <p>
            <a href="/categories/{{$post->category->slug}}">{{$post->category->name}}</a>
        </p>
        <div>
            {!! $post->body !!}
        </div>
    </article>
```
