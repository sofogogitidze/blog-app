@auth
    <form method="POST" action="/posts/{{$post->slug}}/comments"
          class="border border-gray-200 p-6 rounded-xl">
        @csrf

        <header class="flex items-center">
            <img src="https://i.pravatar.cc/60?id={{auth()->id()}}" alt="" width="40" height="40"
                 class="rounded-full">

            <h2 class="ml-4">Want to participate?</h2>
        </header>

        <div class="mt-6">
                            <textarea name="body" rows="5"
                                      required
                                      class="w-full text-sm focus:outline-none focus:ring"
                                      placeholder="Say something, bitch"></textarea>

            @error('body')
            <span class="text-xs text-red-500">{{$message}}</span>
            @enderror
        </div>

        <div class="flex justify-end mt-6 border-t border-gray-200 pt-6">
            <x-form.button>Post</x-form.button>
        </div>
    </form>
@else
    <p class="font-semibold">
        <a class="hover:underline text-blue-500" href="/register">Register</a>
        or
        <a class="hover:underline text-blue-500" href="/login">Log in </a>
        to leave a comment!
    </p>
@endauth
