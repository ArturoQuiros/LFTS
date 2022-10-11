# Lección 8

# Metadata

Lo primero es instalar la dependecia
`composer require spatie/yaml-front-matter`

Agregamos al modelo de **Post** lo ssiguientes atributos y su constructor

```
 public $title;
    public $excerpt;
    public $date;
    public $body;
    public $slug;

    public function __construct($title, $excerpt, $date, $body, $slug)
    {
        $this->title = $title;
        $this->excerpt = $excerpt;
        $this->date = $date;
        $this->body = $body;
        $this->slug = $slug;
    }

```

Agregamos encabezados a los HTML para la metadata

```
title: My XXXX Post
slug: Mi-XXX-post
excerpt: On the other hand, we denounce with righteous indignation
date: 2021-05-21

```

En **post.blade.php** ahora podemos usar la metada

```
 <article>
        <h1>
            <?= $post->title; ?>
        </h1>
        <div>
            <?= $post->body; ?>
        </div>
    </article>
```

En **posts.blade.php** ahora podemos usar la metada

```
<body>
    <?php foreach ($posts as $post) : ?>
    <article>
        <h1>
            <a href="/posts/<?= $post->slug; ?>">
                <?= $post->title; ?>
            </a>
        </h1>
        <div>
            <?= $post->excerpt; ?>
        </div>
    </article>
    <?php endforeach; ?>
</body>
```
