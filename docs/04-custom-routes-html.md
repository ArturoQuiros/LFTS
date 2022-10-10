# Lección 4

# Rutas dinamicas

Lo primero es crear la ruta **post.blade.php** y agregarla en la ruta `/views`

En el achivo **post.blade.php** vamos a crear un _slug_

```
        <article>
           <?= $post; ?>
        </article>
        <a href="/">Go Back</a>
```

Luego creamos carpeta **posts** y ahí pondremos todos las entredas del blog

-   my-first-post.html
-   my-second-post.html
-   my-third-post.html

Finalmente en el archivo **web.php** creamos la ruta capaz de enlazar el _slug_ con los archivos de _posts_

```
Route::get('/posts/{post}', function ( $slug) {

    $path = __DIR__ .  "/../resources/posts/{$slug}.html";

    if (!file_exists($path)){
       return redirect ("/");
    }

    $post = file_get_contents($path);
    return view('post', ["post" => $post ]);
});

```

Esto lo que hace es un wildcard para buscar un archivo HTML que si existe se cargará en la URL y llamará la vista HTML
