# BD

Modificamos el modelo de **Post** para las relaciones con Categoria y Autor

```
    public function category()
    {
        //hasOne, hasMany, belongsTo, belongsToMany
        return $this->belongsTo(Category::class);
    }

    public function author()
    {
        //hasOne, hasMany, belongsTo, belongsToMany
        return $this->belongsTo(User::class, 'user_id');
    }
```

Ajustamos las rutas en **web.php**

```
Route::get('/posts/{post:slug}', function (Post $post) { //Post::where('slug', $post)->firstOrFail()
    return view('post', [
        'post' => $post,
    ]);
}); //where, or whereAlpha, whereNumber, whereAlphaNumeric

Route::get('categories/{category:slug}', function (Category $category) {
    return view('posts', [
        //'posts' => $category->posts->load(['category', 'author']),
        'posts' => $category->posts,
    ]);
});

Route::get('authors/{author:username}', function (User $author) {
    return view('posts', [
        //'posts' => $author->posts->load(['category', 'author']),
        'posts' => $author->posts,
    ]);
});
```

Y probamos con `php artisan migrate:fresh --seed`
