# Lección 5

# Wildcard

Para esta seccion agregamos una expresion regular a nuestra ruta para contemplar el formato que deben tener nuestras rutas

En el archivo **web.php** agregamos la condicion

```
-> where("post", "[A-z_\-]+");
```
