@auth
    <x-panel>
        <form action="/posts/{{$post->slug}}/comments" method="POST">
            @csrf
            <header class="flex items-center">
                <img src="https://i.pravatar.cc/40?u={{auth()->id()}}" alt="" width="40" height="40" class="rounded-xl">
                <h2 class="ml-4">Want to participate?</h2>
            </header>
            <div class="mt-5">
                <textarea name="body" id="body" rows="5" class="w-full text-sm focus:outline-none focus:ring" placeholder="Quick, think of something to say!" required></textarea>
                @error('body')
                    <span class="text-xs text-red-500">{{$message}}</span>
                @enderror
            </div>
            <div class="flex justify-end mt-5 border-t border-gray-200 pt-5">
                <x-submit-button>Post</x-submit-button>
            </div>
        </form>
    </x-panel>
@else
    <p class="font-semibold">
        <a href="/regsiter" class="hover:underline">Register</a> or <a href="/login" class="hover:underline">Log in</a> to leave a comment.
    </p>
@endauth