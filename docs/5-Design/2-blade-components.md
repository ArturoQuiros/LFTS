# Design

Modificamos **posts.blade.php** y hacemos para mover partes de su codigo como componentes

```
<x-layout title="My Blog">

    @include('_posts-header')

    <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">

        @if ($posts->count())
            <x-posts-grid :posts="$posts" />
        @else
            <p class="text-center">No posts yet. Please check back later.</p>
        @endif

    </main>

</x-layout>
```

Entonces creamos los componentes necesarios **posts-grid.blade.php**

```
@props(['posts'])

<x-post-featured-card :post="$posts[0]" />

@if ($posts->count() > 1)
    <div class="lg:grid lg:grid-cols-6">
        @foreach ($posts->skip(1) as $post)
            {{-- @dd(loop) --}}
            <x-post-card :post="$post" class="{{$loop->iteration < 3 ? 'col-span-3' : 'col-span-2'}}" />
        @endforeach
    </div>
@endif
```

Y modificamos **post-card.blade.php**

```
    <div class="text-sm mt-4">
        <p>
            {{$post->excerpt}}
        </p>
    </div>
```

Y actualizamos **post-featured-card.blade.php**

```
    <div class="text-sm mt-2">
        <p>
            {{$post->excerpt}}
        </p>
    </div>
```
