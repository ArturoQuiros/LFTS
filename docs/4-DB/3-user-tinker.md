# BD

Entramos al tinker `sudo php artisan tinker`

Creamos un nuevo usuario desde Tinker

```
sudo php artisan tinker
$user = new App\Models\User;
$user = new User;
$user->name = 'Arturo Quiros';
$user->email = 'arturo@gmail.com';
$user->password = bcrypt('123456789');
$user->save();
```

Usamos nuestros metodos _find_ y _findOrFail_

```
$user;
$user->name;
$user->name = 'Arturo Quiros';
$user->save();
User::find(1);
User::findOrFail(1);
```

Creamos otros nuevo usuario desde Tinker

```
$user = new User;
$user->name = 'Jose Quiros';
$user->email = 'jose@gmail.com';
$user->password = bcrypt('123456789');
$user->save();
```

Lo ligamos con una FK

```
User::all();
$users = User::all();
$users->pluck('name');
$users->map(function($user) {return $user->name});
$users;
$users->first();
$users[0];
exit
```
