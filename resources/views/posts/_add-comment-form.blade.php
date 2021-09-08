@auth
    <x-panel>
        <form action="/posts/{{ $post->slug }}/comments" method="POST">
            @csrf

            <header class="flex">
                <img src="https://i.pravatar.cc/40?u{{ auth()->id() }}"
                     width="40"
                     height="40"
                     class="rounded-full"
                >
                <h2 class="ml-2">Want to participate?</h2>
            </header>

            <div class="mt-6">
                <textarea name="body" rows="5"
                          class="w-full text-sm focus:outline-none focus:ring"
                          placeholder="Quick, thing of something ti say!"
                          required
                ></textarea>

                @error('body')
                    <p class="text-red-500 text-xs">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex justify-end mt-6 pt-6 border-t border-gray-200">
                <x-submit-button>Post</x-submit-button>
            </div>

        </form>

    </x-panel>
@else
    <p class="font-semibold">
        <a href="/register" class="hover:underline">register</a> or <a href="/login" class="hover:underline">Log In</a>to leavea comment!
    </p>
@endauth
