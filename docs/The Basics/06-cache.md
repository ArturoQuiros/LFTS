# Lección 5

# Cache

En esta seccion vamos a cache los HTML porque en caso de no cambie no tenet que volver a leer los archivos

En el archivo **web.php** agregamos una funcion de cache

```
    $post = cache()->remember("posts.{slug}", 3600 , fn() => file_get_contents ($path));

```
