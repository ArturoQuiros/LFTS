# Lección 3

Ruta custom

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
