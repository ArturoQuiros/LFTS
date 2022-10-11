# BD

Creamos el modeo de Cateogry `php artisan make:model Category -m`

Modificamos la migracion para crear una relacion entre _Post_ y _Category_

```
Schema::create('posts', function (Blueprint $table) {
    $table->id();
    $table->foreignId('category_id');
    $table->string('slug')->unique();
    $table->string('title');
    $table->text('excerpt');
    $table->text('body');
    $table->timestamps();
    $table->timestamp('published_at')->nullable();
});
```

Y la nueva migracion de cateory

```
Schema::create('categories', function (Blueprint $table) {
    $table->id();
    $table->string('name');
    $table->string('slug');
    $table->timestamps();
});
```

Volvemos a correr migraciones y crear usuarios.

Modificamos las vitas de **post** y **posts**

```
<article class="{{ $loop->even ? 'foobar' : '' }}">
            <h1>
                <a href="/posts/{{ $post->slug }}">
                    {{ $post->title }}
                </a>
            </h1>
            <p>
                <a href="#">{{$post->category->name}}</a>
            </p>
            <div>
                {{ $post->excerpt }}
            </div>
        </article>
```

```
<article>
        <h1>
            {{ $post->title }}
        </h1>
        <p>
            <a href="#">{{$post->category->name}}</a>
        </p>
        <div>
            {!! $post->body !!}
        </div>
    </article>
```

Y creamos datos

```
use App\Models\Category;
$c = new Category;
$c->name = 'Personal';
$c->slug = 'personal';
$c->save();

$c = new Category;
$c->name = 'Work';
$c->slug = 'work';
$c->save();

$c = new Category;
$c->name = 'Hobbies';
$c->slug = 'hobbies';
$c->save();

use App\Models\Post;
Post::create([
    'title' => 'My Family Post',
    'excerpt' => 'Excerpt for my post',
    'body' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
    'slug' => 'my-family-post',
    'category_id' => 1
]);
Post::create([
    'title' => 'My Work Post',
    'excerpt' => 'Excerpt for my post',
    'body' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
    'slug' => 'my-work-post',
    'category_id' => 2
]);
Post::create([
    'title' => 'My Hobby Post',
    'excerpt' => 'Excerpt for my post',
    'body' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
    'slug' => 'my-hobby-post',
    'category_id' => 3
]);

$post = App\Models\Post::first();
$post;
$post->category();
$post->category;
$post;
$post->category->name;
```

Esto va a permitirnos ver los posts con sus categorias
