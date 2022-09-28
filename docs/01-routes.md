# Primera Lección

## ¿Que son rutas?

    - Las rutas es donde se establece cual URL de nuestra aplicación va a servir cual recurso HTML de nuestra aplicación

## ¿Cómo funcionan las rutas?

Las rutas las podemos encontrar en la carpeta `/resources/routes ` y se ven así

    ```
    Route::get('/', function () { return view('welcome'); });
    ```

Están compuestas por

1. Un verbo HTTP (GET/POST)
2. Un PATH o Ruta
3. Un recurso que va a ser servido
