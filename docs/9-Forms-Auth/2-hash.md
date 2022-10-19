# Auth

Modificamos el **RegisterContoller** para agregar hasheo del password pero no lo habilitaos aún

```
        $attributes['password'] = bcrypt($attributes['password']);

```

Modificamos el modelo **User** agregando la función _setPasswordAttribute_

```
 public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = bcrypt($password);
    }
```
