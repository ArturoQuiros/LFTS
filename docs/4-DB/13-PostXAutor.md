# BD

Modificamos el modelo de **Post**

```
public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
```

Y la igración de **users**

```
Schema::create('users', function (Blueprint $table) {
    $table->id();
    $table->string('username')->unique();
    $table->string('name');
    $table->string('email')->unique();
    $table->timestamp('email_verified_at')->nullable();
    $table->string('password');
    $table->rememberToken();
    $table->timestamps();
});
```

Y el **DatabaseSeeder**

```
 public function run()
    {
        $user = User::factory()->create([
            'name' => 'Arturo Quiros',
            'username' => 'R2D2',
        ]);
        Post::factory(10)->create([
            'user_id' => $user->id,
        ]);
    }
```

La vista de **Post** para agregar la vista por Autor

```
<article>
        <h1>
            {{ $post->title }}
        </h1>
        <p>
            By <a href="/authors/{{$post->author->username}}">{{$post->author->name}}</a> in <a href="/categories/{{$post->category->slug}}">{{$post->category->name}}</a>
        </p>
        <div>
            <p>{{ $post->body }}</p>
        </div>
    </article>
```

La vista de **Posts** agregamos la ruta de autor

```
<p>
                By <a href="/authors/{{$post->author->username}}">{{$post->author->name}}</a> in <a href="/categories/{{$post->category->slug}}">{{$post->category->name}}</a>
            </p>
```

habilitamos la ruta en **web.php**

```
Route::get('authors/{author:username}', function (User $author) {
    return view('posts', [
        'posts' => $author->posts,
    ]);
});
```

Y probamos con `php artisan migrate:fresh --seed`
