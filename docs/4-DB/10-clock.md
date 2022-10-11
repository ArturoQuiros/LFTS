# BD

Vamos agregar una extension llamda Clockwork `composer require itsgoingd/clockwork`

Y modificamos el archivo de rutas **web.php** con la nueva extension agregando una nueva ruta

```
Route::get('/', function () {
    $posts = Post::with('category')->get();
    return view('posts', [
        'posts' => $posts,
    ]);
});

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
