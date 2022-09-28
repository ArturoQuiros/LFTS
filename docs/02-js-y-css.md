# Lección 2

En esta leccion vamos a crear nuesta propia vista utilizando codigo html, css y js

## Creando nuestra vista

Vamos a la ruta `resources/views` y al archivo **welcome.blade.php** y borramos todo su contenido

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
