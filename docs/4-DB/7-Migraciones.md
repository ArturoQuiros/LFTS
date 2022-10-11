# BD

Modificamos la migración de los _posts_

```
Schema::create('posts', function (Blueprint $table) {
    $table->id();
    $table->string('slug')->unique();
    $table->string('title');
    $table->text('excerpt');
    $table->text('body');
    $table->timestamps();
    $table->timestamp('published_at')->nullable();
});

```

Volvemos a correr migraciones y cargar datos

Modificamos las rutas de **web.php**

```
Route::get('/', function () {
    $posts = Post::all();
    return view('posts', [
        'posts' => $posts,
    ]);
});

Route::get('/posts/{post:slug}', function (Post $post) { //Post::where('slug', $post)->firstOrFail()
    return view('post', [
        'post' => $post,
    ]);
});
```
