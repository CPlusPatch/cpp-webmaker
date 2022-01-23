<x-app-layout>
    <x-slot name="header">
        <h2 class="flex items-center text-xl font-semibold leading-tight text-gray-800 dark:text-white grow">
            {{ __('Dashboard') }}
        </h2>
        <a href="{{ route("posts.create") }}">
            <x-button type="button">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="mr-2 bi bi-file-earmark-post" viewBox="0 0 16 16">
                    <path d="M14 4.5V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h5.5L14 4.5zm-3 0A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V4.5h-2z"/>
                    <path d="M4 6.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-.5.5h-7a.5.5 0 0 1-.5-.5v-7zm0-3a.5.5 0 0 1 .5-.5H7a.5.5 0 0 1 0 1H4.5a.5.5 0 0 1-.5-.5z"/>
                </svg>
                New post
            </x-button>
        </a>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            {{-- <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    You're logged in!
                </div>
            </div> --}}
            <div id="posts" class="grid grid-cols-1 gap-12 md:grid-cols-2 xl:grid-cols-3">
                @for ($i = 0; $i < 6; $i++)
                <x-blog.post-card-skeleton>
                </x-blog.post-card>
                @endfor
            </div>
        </div>
    </div>

    <script>
        $(() => {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.get({
                url: "/posts",
                data: {
                    page: 1,
                    
                }
            })
            .then((res) => {
                $("#posts").html(res);
                //snackbar().toggle();
            })
            .catch((err) => {
                snackbar("There was an error fetching posts. Please try again.")
                console.error(err);
            });
        });
    </script>
</x-app-layout>
