# Leccion 9

Vamos al modelo de **Post.php** y agregamos la opcion de ordenar por fecha y cache

```
public static function all()
    {
        return cache()->rememberForever('posts.all', function () {
            $files = File::files(resource_path("posts/"));

            return collect($files)
            ->map(function ($file) {
                return YamlFrontMatter::parseFile($file);
            })
            ->map(function ($document) {
                return new Post(
                    $document->title,
                    $document->excerpt,
                    $document->date,
                    $document->body(),
                    $document->slug,
                );
            })
            ->sortByDesc('date');
        });

    }
```

Modificamos las fechas de los posts para que se ordenen por fecha

Creamos el 5to post **My-fith-post.html**

Usamos tinker
`php artisan tinker`

Limpiamos el cache
`cache()->forget("posts.all");`

Agregamos cache
`cache()->put('foo', 'bar');`
