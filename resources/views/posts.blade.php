<x-layout title="My Blog">
    {{-- <x-slot name="content">
        Hello
    </x-slot> --}}
    @foreach ($posts as $post)
        <article class="{{ $loop->even ? 'foobar' : '' }}">
            <h1>
                <a href="/posts/{{ $post->id }}">
                    {{ $post->title }}
                </a>
            </h1>
            <div>
                {{ $post->excerpt }}
            </div>
        </article>
    @endforeach
</x-layout>