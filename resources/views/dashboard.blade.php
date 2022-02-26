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

    <!-- <div class="relative flex flex-row w-full mx-auto mt-6 mb-4 max-w-7xl sm:px-6 lg:px-8">
        <h1 class="text-2xl font-semibold">Recent photos</h1>
    </div>

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
    })" class="relative flex flex-row mx-auto max-w-7xl">
        <div class="absolute inset-y-0 left-0 z-10 flex items-center">
            <button @click="swiper.slidePrev()"
                class="flex items-center justify-center w-10 h-10 -ml-2 bg-white rounded-full shadow lg:-ml-4 focus:outline-none">
                <svg viewBox="0 0 20 20" fill="currentColor" class="w-6 h-6 chevron-left">
                    <path fill-rule="evenodd"
                        d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                        clip-rule="evenodd"></path>
                </svg>
            </button>
        </div>

        <div class="w-full swiper-container" x-ref="container">
            <div class="flex swiper-wrapper">
                <div class="p-4 swiper-slide">
                    <div class="flex flex-col overflow-hidden rounded shadow">
                        <div class="flex-shrink-0">
                            <img class="object-cover w-full h-48"
                                src="https://images.unsplash.com/photo-1496128858413-b36217c2ce36?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1679&q=80"
                                alt="">
                        </div>
                    </div>
                </div>

                <div class="p-4 swiper-slide">
                    <div class="flex flex-col overflow-hidden rounded shadow">
                        <div class="flex-shrink-0">
                            <img class="object-cover w-full h-48"
                                src="https://images.unsplash.com/photo-1598951092651-653c21f5d0b9?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=500&q=80"
                                alt="">
                        </div>
                    </div>
                </div>

                <div class="p-4 swiper-slide">
                    <div class="flex flex-col overflow-hidden rounded shadow">
                        <div class="flex-shrink-0">
                            <img class="object-cover w-full h-48"
                                src="https://images.unsplash.com/photo-1598946423291-ce029c687a42?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=500&q=80"
                                alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="absolute inset-y-0 right-0 z-10 flex items-center">
            <button @click="swiper.slideNext()"
                class="flex items-center justify-center w-10 h-10 -mr-2 bg-white rounded-full shadow lg:-mr-4 focus:outline-none">
                <svg viewBox="0 0 20 20" fill="currentColor" class="w-6 h-6 chevron-right">
                    <path fill-rule="evenodd"
                        d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                        clip-rule="evenodd"></path>
                </svg>
            </button>
        </div>
    </div> -->

    <div class="relative flex flex-row w-full mx-auto mt-4 max-w-7xl px-6 lg:px-8">
        <h1 class="text-2xl font-semibold">Recent posts</h1>
    </div>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            @livewire("latest-posts")
        </div>
    </div>

    {{-- <script>
        $(() => {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            /* $.get({
				url: "/posts",
				data: {
					page: 1,
				}
			}).then((res) => {
				$("#posts").html(res);
			}).catch((err) => {
				snackbar("There was an error fetching posts. Please try again.")
				console.error(err);
			}); */
        });

    </script> --}}
	<script>
		$(() => {
			$.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
		});
	</script>
</x-app-layout>
