<div id="post-{{ $uuid }}">
    <div class="relative m-auto duration-200 shadow-lg w-80 sm:w-96 hover:scale-105" style="z-index: {{ $z }}">
        <div class="relative block w-full">
            
            <div class="w-full h-48 @if ($image == "") bg-gray-200 @endif relative flex items-end bg-center bg-cover rounded-md" @if ($image != "") style="background-image: url('{{ $image }}')" @endif>
                <div class="flex flex-row items-end justify-between w-full p-5 mt-20 rounded-md bg-gradient-to-b from-transparent to-gray-600">
                    <a href="/posts/{{ $slug }}" class="z-30 text-xl text-white cursor-pointer">{{ $title }}</a>
					@if(auth()->user() && auth()->user()->role == "admin")
					<x-dropdown align="right" width="auto" collapseOnClick="false">
						<x-slot name="trigger">
							<button class="flex items-center p-1 text-sm font-medium text-black bg-white rounded-sm shadow-lg">
								<svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="w-5 h-5" viewBox="0 0 16 16">
									<path d="M3 9.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3z"/>
								</svg>
							</button>
						</x-slot>
	
						<x-slot name="content">
							<x-dropdown-button id="delete-{{ $uuid }}" class="flex flex-row items-center justify-center w-full text-rose-700">
								<svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="w-5 h-5 mr-2" viewBox="0 0 16 16">
									<path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
  									<path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
								</svg>
								Delete
							</x-dropdown-button>
							<x-dropdown-button class="flex flex-row items-center justify-start w-full text-blue-700" @click="event.preventDefault(); window.location.replace('/post/{{ $uuid }}/edit')">
								<svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="w-5 h-5 mr-2" viewBox="0 0 16 16">
									<path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001zm-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708l-1.585-1.585z"/>
								</svg>
								Edit
							</x-dropdown-button>
						</x-slot>
					</x-dropdown>
					@endif
                </div>
            </div>
            
            {{-- <div x-show="isOpen">
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
            </div> --}}
        </div>
    </div>
	@if(auth()->user() && auth()->user()->role == "admin")
	<script>
		$(() => {
			function delete_{{ str_replace("-", "_", $uuid) }}() {
				$("#delete-{{ $uuid }}").on("click", function(event) {
					event.preventDefault();
					var button = this;
					$(button).removeClass("hover:bg-gray-100 text-rose-700 focus:bg-gray-100 text-gray-700").addClass("bg-rose-700 text-white").text("Sure?");
					$(button).on("mouseleave", function() {
						$(button).removeClass("bg-rose-700 text-white").addClass("text-rose-700 hover:bg-gray-100 focus:bg-gray-100 text-gray-700").html('<svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="w-5 h-5 mr-2" viewBox="0 0 16 16"><path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/><path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/></svg> Delete');
						$(button).off("mouseleave click");
						delete_{{ str_replace("-", "_", $uuid) }}();
					})
					$(button).on("click", function(event) {
						event.preventDefault();
						$(button).off("mouseleave");
						$(button).text('Deleting...');
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
	@endif
</div>