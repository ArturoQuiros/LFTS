# BD

El Factory nos dice cuantos elementos se crearan

Lo creamos con el comando `php artisan make:factory PostFactory` y lo modificamos

```
 public function definition()
    {
        return [
            'user_id' => User::factory(),
            'category_id' => Category::factory(),
            'title' => $this->faker->sentence(),
            'excerpt' => $this->faker->sentence(),
            'slug' => $this->faker->slug(),
            'body' => $this->faker->paragraph(),
        ];
    }

```

Que mediante el _faker_ nos dice como se verán los datos

Hacemos lo mismo con Category

Lo creamos con el comando `php artisan make:factory CategoryFactory` y lo modificamos

```
public function definition()
    {
        return [
            'name' => $this->faker->word(),
            'slug' => $this->faker->slug(),
        ];
    }
```

Finalmente ajustamos el **DatabaseSeeder** para usar los factories

```
public function run()
    {
        $user = User::factory()->create([
            'name' => 'Arturo Quiros'
        ]);
        Post::factory(10)->create([
            'user_id' => $user->id,
        ]);
    }
```

Y ahora es considerablemente mas legible y facil de manipular

Probamos con el comando `php artisan migrate:fresh --seed`

Y si bien los datos no parecen tener sentido, son datos de prueba generados de manera dinámica
