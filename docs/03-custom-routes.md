# Lección 3

# Rutas custom

## Creando nuestra vista

Vamos a la ruta `resources/views` y creamos archivo **posts.blade.php** y borramos todo su contenido

Creamos uno nuevo con un "Hola mundo"

```
<!doctype html>

<title>My Blog</title>

<body>

<h1>Helo World</h1>
</body>

```

## Dandole estilos

Vamos a la ruta `public` y al archivo **app.css** y ahi daremos el siguiente estilo

```
body {
    background-color: gainsboro;
    color: blue;
}

```

Y luego agregamos la hoja de estilo a la ruta

```
<link rel= "stylesheet" href="/app.css">
```

## Agregando JS

Vamos a la ruta `public` y al archivo **app.js** y ahi pondremos el codigo

```
alert ("Hello World!")
```

Y luego agregamos la hoja de estilo a la ruta

```
<script src="/app.js"> </script>
```

---

## Usando una vista custom

Modificamos las rutas para el home **_/_** y **_/posts_**

```

Route::get('/', function () {
    return view('posts');
});

Route::get('/post', function () {
    return view('post');
});


```

Vamos a la ruta `resources/views` y creamos archivo **post.blade.php** y creamos el contenido para la ruta **/post**

```
<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Post</title>
        <link rel="stylesheet" href="/app2.css">
    </head>
    <body>
        <article>
            <h1><a href="/post">My First Post</a></h1>
            <p>"On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment,
                so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their duty through
                weakness of will, which is the same as saying through shrinking from toil and pain. These cases are perfectly simple and easy to distinguish. In a free hour,
                when our power of choice is untrammelled and when nothing prevents our being able to do what we like best, every pleasure is to be welcomed and every pain avoided.
                But in certain circumstances and owing to the claims of duty or the obligations of business it will frequently occur that pleasures have to be repudiated and annoyances
                accepted. The wise man therefore always holds in these matters to this principle of selection: he rejects pleasures to secure other greater pleasures, or else he endures
                pains to avoid worse pains."</p>
        </article>
        <a href="/">Go Back</a>
    </body>
    </html>
```

Finalmente modificamos los estilos finales en el archivo **_/app.css_**

```
body {
    background-color: white;
    color: black;
    max-width: 600px;
    margin: auto;
    font-family: sans-serif;
}

p {
    line-height: 1.6;
}

article + article {
    margin-top: 3rem;
    padding-top: 3rem;
    border-top: 1px solid #c5c5c5;
}

```
