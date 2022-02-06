<div x-data="{isOpen: false }" @mouseover="isOpen = true" @mouseover.away="isOpen = false" id="post-{{ $uuid }}">
    <div class="relative z-10 hover:z-20 m-auto overflow-hidden duration-200 rounded-lg shadow-lg cursor-pointer w-72 sm:w-80 hover:scale-105">
        <a href="/posts/{{ $slug }}" class="relative block w-full">
            @if ($image != "")
            <div class="w-full h-40 bg-[url('{{ $image }}')] relative flex items-end bg-center bg-cover">
                <div class="absolute bottom-0 left-0 right-0 p-5 mt-20 bg-gradient-to-b from-transparent to-gray-600">
                    <h3 class="z-50 text-xl text-white">{{ $title }}</h3>
                   {{--  <h5 class="z-50 text-white text-md">Example label</h5> --}}
                </div>
            </div>
            @else
            <div class="relative flex items-end w-full h-40 bg-gray-200 bg-center bg-cover">
                <div class="absolute bottom-0 left-0 right-0 p-5 mt-20 bg-gradient-to-b from-transparent to-gray-600">
                    <h3 class="z-50 text-xl text-white">{{ $title }}</h3>
                   {{--  <h5 class="z-50 text-white text-md">Example label</h5> --}}
                </div>
            </div>
            @endif
            
            <div x-show="isOpen"
                x-transition:enter="transition-all ease-in-out duration-300" 
                x-transition:enter-start="h-0" 
                x-transition:enter-end="h-auto" 
                x-transition:leave="transition-all ease-in-out duration-300" 
                x-transition:leave-start="h-auto" 
                x-transition:leave-end="h-0">
                <div class="z-50 w-full p-4 overflow-hidden bg-white dark:bg-gray-800">
                    <p class="font-medium text-indigo-500 text-md">
                        Article
                    </p>
                    <p class="mb-2 text-xl font-medium text-gray-800 dark:text-white">
                        {{ $title }}
                    </p>
                    <div class="font-light text-gray-400 dark:text-gray-300 text-md">
                        @php
                        try {
                            $htmlDesc = new SyntaxPhoenix\EJSParserBundle\Parser\EditorjsParser(json_decode($description));
                            $htmlDesc = $htmlDesc->toHtml();
                        } catch (Exception $e) {
                            $htmlDesc = $e;
                        }
                        $truncateService = new Urodoz\Truncate\TruncateService(); // Use this lib to prevent parts of the HTML tags from being truncated
                        @endphp
                        {!! $truncateService->truncate($htmlDesc, 100, "..."); !!}
                    </div>
                    <div class="flex items-center mt-4">
                        <div class="relative block">
                            <img alt="profil" src="/cdn/9fd1f5b2-b011-41d7-aebd-faebb7472938.jpg"
                                class="object-cover w-10 h-10 mx-auto rounded-full " />
                        </div>
                        <div class="flex flex-col justify-between ml-4 text-sm">
                            <p class="text-gray-800 dark:text-white">
                                {{ $author }}
                            </p>
                            <p class="text-gray-400 dark:text-gray-300">
                                {{ $date }} - 0 min read
                            </p>
                        </div>
                    </div>

                    <div class="z-0 flex justify-between mt-3">
                        <button id="delete-{{ $uuid }}" class="flex flex-row items-center justify-center px-2 py-1 font-semibold duration-150 ease-in-out bg-white rounded shadow-md dark:bg-gray-800 text-rose-700 hover:scale-105">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="w-6 h-6 pr-1" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M13.854 2.146a.5.5 0 0 1 0 .708l-11 11a.5.5 0 0 1-.708-.708l11-11a.5.5 0 0 1 .708 0Z"/>
                                <path fill-rule="evenodd" d="M2.146 2.146a.5.5 0 0 0 0 .708l11 11a.5.5 0 0 0 .708-.708l-11-11a.5.5 0 0 0-.708 0Z"/>
                            </svg>
                            Delete
                        </button>
                        <button @click="event.preventDefault(); window.location.replace('/post/{{ $uuid }}/edit')" class="flex flex-row items-center justify-center px-2 py-1 font-semibold text-blue-700 duration-150 ease-in-out bg-white rounded shadow-md dark:bg-gray-800 hover:scale-105">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="w-6 h-6 pr-2" viewBox="0 0 16 16">
                                <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001zm-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708l-1.585-1.585z"/>
                            </svg>
                            Edit
                        </button>
                    </div>
                </div>
            </div>
        </a>
    </div>
</div>
<script>
    $(() => {
        function delete_{{ str_replace("-", "_", $uuid) }}() {
            $("#delete-{{ $uuid }}").on("click", function() {
                var button = this;
                $(button).removeClass("text-rose-700").addClass("bg-rose-700 text-white").text("Are you sure?");
                $(button).on("mouseleave", function() {
                    $(button).removeClass("bg-rose-700 text-white").addClass("text-rose-700").html('<svg xmlns="http:\/\/www.w3.org/2000/svg" fill="currentColor" class="w-6 h-6 pr-1" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M13.854 2.146a.5.5 0 0 1 0 .708l-11 11a.5.5 0 0 1-.708-.708l11-11a.5.5 0 0 1 .708 0Z"/><path fill-rule="evenodd" d="M2.146 2.146a.5.5 0 0 0 0 .708l11 11a.5.5 0 0 0 .708-.708l-11-11a.5.5 0 0 0-.708 0Z"/></svg>Delete');
                    $(button).off("mouseleave click");
                    delete_{{ str_replace("-", "_", $uuid) }}();
                })
                $(button).on("click", function() {
                    $(button).off("mouseleave");
                    $(button).html('<svg xmlns="http:\/\/www.w3.org/2000/svg" fill="currentColor" class="w-6 h-6 pr-1 animate-pulse" viewBox="0 0 16 16"><path d="M3 9.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3z"/></svg>Deleting');
                    $.post({
                        url: "/post/{{ $uuid }}",
                        data: {
                            _method: 'DELETE',
                        }
                    }).then((res) => {
                        snackbar("Post deleted successfully!");
                        $("#post-{{ $uuid }}").remove();
                    }).catch((err) => {
                        console.error(err);
                        snackbar("There was an error deleting the post")
                    });
                });
            });
        }
        delete_{{ str_replace("-", "_", $uuid) }}();
    });
</script>