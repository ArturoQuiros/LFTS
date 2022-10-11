# BD

Vamos al .env y ajustamos las variables de entorno

```
DB_CONNECTION=mysql
DB_HOST=localhost
DB_PORT=3306
DB_DATABASE=blog
DB_USERNAME=root
DB_PASSWORD=
```

Nos conectamos la BD de MYSQL `sudo mysql -uroot`
Creamos la BD Blog `create database blog;`

Ahora podemos corrar las migraciones con `php artisan migrate`

Despues de eso nos conectamos a la BD desde nuestra maquina anfitriona
