<x-app-layout>
    <x-slot name="header">
        <h2 class="flex items-center text-xl font-semibold leading-tight text-gray-800 dark:text-white grow">
            {{ __('Dashboard') }}
        </h2>
        <a href="{{ route("posts.create") }}">
            <x-button type="button">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                    class="mr-2 bi bi-file-earmark-post" viewBox="0 0 16 16">
                    <path
                        d="M14 4.5V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h5.5L14 4.5zm-3 0A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V4.5h-2z" />
                    <path
                        d="M4 6.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-.5.5h-7a.5.5 0 0 1-.5-.5v-7zm0-3a.5.5 0 0 1 .5-.5H7a.5.5 0 0 1 0 1H4.5a.5.5 0 0 1-.5-.5z" />
                </svg>
                New post
            </x-button>
        </a>
    </x-slot>

    <div x-data="{swiper: null}" x-init="swiper = new Swiper($refs.container, {
      loop: true,
      slidesPerView: 1,
      spaceBetween: 0,
  
      breakpoints: {
        640: {
          slidesPerView: 1,
          spaceBetween: 0,
        },
        768: {
          slidesPerView: 2,
          spaceBetween: 0,
        },
        1024: {
          slidesPerView: 3,
          spaceBetween: 0,
        },
      },
    })" class="relative max-w-7xl mx-auto flex flex-row">
        <div class="absolute inset-y-0 left-0 z-10 flex items-center">
            <button @click="swiper.slidePrev()"
                class="bg-white -ml-2 lg:-ml-4 flex justify-center items-center w-10 h-10 rounded-full shadow focus:outline-none">
                <svg viewBox="0 0 20 20" fill="currentColor" class="chevron-left w-6 h-6">
                    <path fill-rule="evenodd"
                        d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                        clip-rule="evenodd"></path>
                </svg>
            </button>
        </div>

        <div class="swiper-container w-full" x-ref="container">
            <div class="swiper-wrapper flex">
                <!-- Slides -->
                <div class="swiper-slide p-4">
                    <div class="flex flex-col rounded shadow overflow-hidden">
                        <div class="flex-shrink-0">
                            <img class="h-48 w-full object-cover"
                                src="https://images.unsplash.com/photo-1496128858413-b36217c2ce36?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1679&q=80"
                                alt="">
                        </div>
                    </div>
                </div>

                <div class="swiper-slide p-4">
                    <div class="flex flex-col rounded shadow overflow-hidden">
                        <div class="flex-shrink-0">
                            <img class="h-48 w-full object-cover"
                                src="https://images.unsplash.com/photo-1598951092651-653c21f5d0b9?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=500&q=80"
                                alt="">
                        </div>
                    </div>
                </div>

                <div class="swiper-slide p-4">
                    <div class="flex flex-col rounded shadow overflow-hidden">
                        <div class="flex-shrink-0">
                            <img class="h-48 w-full object-cover"
                                src="https://images.unsplash.com/photo-1598946423291-ce029c687a42?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=500&q=80"
                                alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="absolute inset-y-0 right-0 z-10 flex items-center">
            <button @click="swiper.slideNext()"
                class="bg-white -mr-2 lg:-mr-4 flex justify-center items-center w-10 h-10 rounded-full shadow focus:outline-none">
                <svg viewBox="0 0 20 20" fill="currentColor" class="chevron-right w-6 h-6">
                    <path fill-rule="evenodd"
                        d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                        clip-rule="evenodd"></path>
                </svg>
            </button>
        </div>
    </div>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div id="posts" class="grid grid-cols-1 gap-12 md:grid-cols-2 lg:grid-cols-3">
                @for ($i = 0; $i < 12; $i++) <x-blog.post-card-skeleton>
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
                })
                .catch((err) => {
                    snackbar("There was an error fetching posts. Please try again.")
                    console.error(err);
                });
        });

    </script>
</x-app-layout>
