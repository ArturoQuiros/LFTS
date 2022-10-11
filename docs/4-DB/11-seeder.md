# BD

En esta leccion se usan los seeders que funcionan para generar datos de una manera rapida

Modificamos la migracions de _posts_

```
Schema::create('posts', function (Blueprint $table) {
    $table->id();
    $table->foreignId('user_id');
    $table->foreignId('category_id');
    $table->string('slug')->unique();
    $table->string('title');
    $table->text('excerpt');
    $table->text('body');
    $table->timestamps();
    $table->timestamp('published_at')->nullable();
});
```

Modificamos la migracions de _category_

```
Schema::create('categories', function (Blueprint $table) {
    $table->id();
    $table->string('name')->unique();
    $table->string('slug')->unique();
    $table->timestamps();
});

```

Modificamos la vista de **post**

```
        <h1>
            {{ $post->title }}
        </h1>
        <p>
            By <a href="#">{{$post->user->name}}</a> in <a href="/categories/{{$post->category->slug}}">{{$post->category->name}}</a>
        </p>
        <div>
            <p>{{ $post->body }}</p>
        </div>
```

Y modelo **Post** para agregar sus relaciones

```
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
```

Agregamos el el modelo **User**

```
public function posts()
    {
        //hasOne, hasMany, belongsTo, belongsToMany
        return $this->hasMany(Post::class);
    }
```

Y modificamos el **DatabaseSeeder**

```
<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
    * Seed the application's database.
    *
    * @return void
    */
    public function run()
    {

        User::truncate();
        Category::truncate();
        Post::truncate();

        $user = User::factory()->create();

        $personal = Category::create([
            'name' => 'Personal',
            'slug' => 'personal',
        ]);
        $work = Category::create([
            'name' => 'Work',
            'slug' => 'work',
        ]);
        $hobbies = Category::create([
            'name' => 'Hobbies',
            'slug' => 'hobbies',
        ]);

        Post::create([
            'title' => 'My Family Post',
            'excerpt' => 'Excerpt for my post',
            'body' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
            'slug' => 'my-family-post',
            'category_id' => $personal->id,
            'user_id' => $user->id,
        ]);

        Post::create([
            'title' => 'My Work Post',
            'excerpt' => 'Excerpt for my post',
            'body' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
            'slug' => 'my-work-post',
            'category_id' => $work->id,
            'user_id' => $user->id,
        ]);

        Post::create([
            'title' => 'My Hobby Post',
            'excerpt' => 'Excerpt for my post',
            'body' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
            'slug' => 'my-hobby-post',
            'category_id' => $hobbies->id,
            'user_id' => $user->id,
        ]);
    }
}
```

Y probamos las migraciones `php artisan migrate:fresh --seed`
