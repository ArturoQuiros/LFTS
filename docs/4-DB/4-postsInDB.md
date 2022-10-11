# BD

Eliminamos el archivo modelo **Post** y **resources/posts/**

Creamos la migración de **post_table** con php
`php artisan make:migration create_posts_table`

Modificamos la migracion que se crea en **/bd/2022_10_11_create_post_table**

```
Schema::create('posts', function (Blueprint $table) {
    $table->id();
    $table->string('title');
    $table->text('excerpt');
    $table->text('body');
    $table->timestamps();
    $table->timestamp('published_at')->nullable();
});
```

Corremos migraciones
`sudo php artisan migrate `

Creamos el modelo de Post `php artisan make:model Post

Y los posts con Tinker

```
App\Models\Post::all();
App\Models\Post::count();

$post = new App\Models\Post;
$post->title = 'My First Post';
$post->excerpt = 'This is my first post guys omg this is so amazing';
$post->body = 'On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their duty through weakness of will, which is the same as saying through shrinking from toil and pain. These cases are perfectly simple and easy to distinguish. In a free hour, when our power of choice is untrammelled and when nothing prevents our being able to do what we like best, every pleasure is to be welcomed and every pain avoided. But in certain circumstances and owing to the claims of duty or the obligations of business it will frequently occur that pleasures have to be repudiated and annoyances accepted. The wise man therefore always holds in these matters to this principle of selection: he rejects pleasures to secure other greater pleasures, or else he endures pains to avoid worse pains.';
$post->save();

use App\Models\Post;
Post::count();
Post::all();

$post = new App\Models\Post;
$post->title = 'My Second Post';
$post->excerpt = 'This is my second post guys omg this is so amazing';
$post->body = 'On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their duty through weakness of will, which is the same as saying through shrinking from toil and pain. These cases are perfectly simple and easy to distinguish. In a free hour, when our power of choice is untrammelled and when nothing prevents our being able to do what we like best, every pleasure is to be welcomed and every pain avoided. But in certain circumstances and owing to the claims of duty or the obligations of business it will frequently occur that pleasures have to be repudiated and annoyances accepted. The wise man therefore always holds in these matters to this principle of selection: he rejects pleasures to secure other greater pleasures, or else he endures pains to avoid worse pains.';
$post->save();
exit
```

Luego modificamos las rutas **web.php**

```
Route::get('/', function () {
    $posts = Post::all();
    return view('posts', [
        'posts' => $posts,
    ]);
});

Route::get('/posts/{post}', function ($id) {
    $post = Post::findOrFail($id);
    return view('post', [
        'post' => $post,
    ]);
});
```

Y esto nos va a permitir ver nuevamente nuestros 2 post en el index de la aplicación
