# Lección 5

# Filesystem

En **web.php**
Creamos una ruta mas simple que responda mejor al comentario

```
    $post = Post::find($slug);


    return view ("post", [
        "post" => $post
    ])

```

En la carpeta **Models** creamos una archivo **Post.php**

```
    <?php

namespace App\Models;

use Illuminate\Database\Eloquent\ModelNotFoundException;

class Post
{
    public static function find ($slug)
    {
        base_path();

        if (!file_exists($path = resource_path("posts/{slug}.html"))){
           throw new ModelNotFoundException();
        }


    return cache()->remember("posts.{$slug}", 1200 , fn() => file_get_contents ($path));
    }
}

```

Que trae el método _find_ de la ruta

Modificamos el archvio **post.blade.php** para que cargue dinamicamente los posts segun los HTMLS

```
    <body>
    <?php foreach ($posts as $post) : ?>
    <article>
        <?= $post; ?>
    </article>
    <?php endforeach; ?>
    </body>

```

Agregamos la funcion _all()_ en **/Models/posts**

```
    public static function all()
    {
        $files = File::files(resource_path("posts/"));
        return array_map(function ($file) {
            return $file->getContents();
        }, $files);
    }

```
