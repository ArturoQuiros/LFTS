# Blade

Vamos al archivo modelo **Post.php** y modificamos los metodos _find_ y creamos _findOrFail_

```
public static function find($slug)
    {
        return static::all()->firstWhere('slug', $slug);
    }

    public static function findOrFail($slug)
    {
        $post = static::find($slug);

        if(!$post) {
            throw new ModelNotFoundException();
        }

        return $post;
    }
```

Luego modificamos las rutas en **web.php** para usar el nuevo metodo _findOrFail_

```
Route::get('/posts/{post}', function ($slug) {
    $post = Post::findOrFail($slug);
    return view('post', [
        'post' => $post,
    ]);
});
```
