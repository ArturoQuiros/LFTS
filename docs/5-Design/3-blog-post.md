# Design

Creamos un nuevo componente de boton **category-button.blade.php**

```
@props(['category'])

    <a href="/categories/{{$category->slug}}"
    class="px-3 py-1 border border-blue-300 rounded-full text-blue-300 text-xs uppercase font-semibold"
    style="font-size: 10px">{{$category->name}}</a>
```

Modificamos las vistas donde hay botones para que usen nuestro componente

**post-card.blade.php**

```
    <header>
        <div class="space-x-2">
            <x-category-button :category="$post->category" />
        </div>
        <div class="mt-4">
            <h1 class="text-3xl">
                <a href="/posts/{{$post->slug}}">
                    {{$post->title}}
                </a>
            </h1>
            <span class="mt-2 block text-gray-400 text-xs">
                Published <time>{{$post->created_at->diffForHumans()}}</time>
            </span>
        </div>
    </header>
```

**post-featured-card.blade.php**

```
            <header class="mt-8 lg:mt-0">
                <div class="space-x-2">
                    <x-category-button :category="$post->category" />
                </div>

                <div class="mt-4">
                    <h1 class="text-3xl">
                        <a href="/posts/{{$post->slug}}">
                            {{$post->title}}
                        </a>
                    </h1>

                    <span class="mt-2 block text-gray-400 text-xs">
                            Published <time>{{$post->created_at->diffForHumans()}}</time>
                        </span>
                </div>
            </header>

```
