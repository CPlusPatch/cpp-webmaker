<x-editor-layout>
	<x-slot name="header">
		<a href="/dashboard" alt="Return to dashboard" class="mr-3 inline-flex items-center px-2 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-white uppercase hover:bg-blue-900 hover:scale-105 transition-all active:bg-blue-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 ease-in-out duration-150">
			<svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="w-8 h-8" viewBox="0 0 16 16">
				<path d="M1 2a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2zm5 0a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V2zm5 0a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1h-2a1 1 0 0 1-1-1V2zM1 7a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V7zm5 0a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7zm5 0a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1h-2a1 1 0 0 1-1-1V7zM1 12a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1v-2zm5 0a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1v-2zm5 0a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1h-2a1 1 0 0 1-1-1v-2z"/>
			</svg>
		</a>
		<div class="flex flex-col">
			<input id="title-input" type="text" class="p-0 text-xl border-0 appearance-none mb-1 transition-all ease-in-out duration-150 hover:outline-0 hover:border-0 ring-0 focus:ring-0 hover:bg-gray-100 rounded hover:pl-2 hover:text-gray-800" value="Editor">
			<div class="flex flex-row items-center">
				{{-- <x-dropdown align="left" width="48">
                    <x-slot name="trigger">
                        <button class="flex items-center text-sm rounded px-2 py-1 font-medium text-black hover:bg-gray-200 focus:bg-gray-200 transition duration-300 ease-in-out">
							File
                        </button>
                    </x-slot>
					
                    <x-slot name="content">
						<x-dropdown-link href="#">
							{{ __('Preferences') }}
						</x-dropdown-link>
                    </x-slot>
                </x-dropdown> --}}
				<h5 id="changes-saved-text" class="text-gray-600 my-0 italic">All changes have been saved</h5>
				<h5 id="saving-text" class="text-gray-600 my-0 italic items-center animate-pulse hidden">
					<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cloud-arrow-up-fill pr-1" viewBox="0 0 16 16">
						<path d="M8 2a5.53 5.53 0 0 0-3.594 1.342c-.766.66-1.321 1.52-1.464 2.383C1.266 6.095 0 7.555 0 9.318 0 11.366 1.708 13 3.781 13h8.906C14.502 13 16 11.57 16 9.773c0-1.636-1.242-2.969-2.834-3.194C12.923 3.999 10.69 2 8 2zm2.354 5.146a.5.5 0 0 1-.708.708L8.5 6.707V10.5a.5.5 0 0 1-1 0V6.707L6.354 7.854a.5.5 0 1 1-.708-.708l2-2a.5.5 0 0 1 .708 0l2 2z"/>
					</svg>
					Saving...
				</h5>
			</div>
		</div>
		<div class="flex flex-row items-center w-full justify-end">
			<button data-toggle="editor-settings" class="flex items-center text-sm rounded p-2 font-medium text-black hover:bg-gray-200 focus:bg-gray-200 transition duration-300 ease-in-out">
				<svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="w-7 h-7" viewBox="0 0 16 16">
					<path d="M7.068.727c.243-.97 1.62-.97 1.864 0l.071.286a.96.96 0 0 0 1.622.434l.205-.211c.695-.719 1.888-.03 1.613.931l-.08.284a.96.96 0 0 0 1.187 1.187l.283-.081c.96-.275 1.65.918.931 1.613l-.211.205a.96.96 0 0 0 .434 1.622l.286.071c.97.243.97 1.62 0 1.864l-.286.071a.96.96 0 0 0-.434 1.622l.211.205c.719.695.03 1.888-.931 1.613l-.284-.08a.96.96 0 0 0-1.187 1.187l.081.283c.275.96-.918 1.65-1.613.931l-.205-.211a.96.96 0 0 0-1.622.434l-.071.286c-.243.97-1.62.97-1.864 0l-.071-.286a.96.96 0 0 0-1.622-.434l-.205.211c-.695.719-1.888.03-1.613-.931l.08-.284a.96.96 0 0 0-1.186-1.187l-.284.081c-.96.275-1.65-.918-.931-1.613l.211-.205a.96.96 0 0 0-.434-1.622l-.286-.071c-.97-.243-.97-1.62 0-1.864l.286-.071a.96.96 0 0 0 .434-1.622l-.211-.205c-.719-.695-.03-1.888.931-1.613l.284.08a.96.96 0 0 0 1.187-1.186l-.081-.284c-.275-.96.918-1.65 1.613-.931l.205.211a.96.96 0 0 0 1.622-.434l.071-.286zM12.973 8.5H8.25l-2.834 3.779A4.998 4.998 0 0 0 12.973 8.5zm0-1a4.998 4.998 0 0 0-7.557-3.779l2.834 3.78h4.723zM5.048 3.967c-.03.021-.058.043-.087.065l.087-.065zm-.431.355A4.984 4.984 0 0 0 3.002 8c0 1.455.622 2.765 1.615 3.678L7.375 8 4.617 4.322zm.344 7.646.087.065-.087-.065z"/>
				</svg>
			</button>
		</div>
	</x-slot>
	<style>
		.prose :where(img):not(:where([class~="not-prose"] *)) {
			/* Fix for TailwindCSS adding margins to images */
			margin-top: 0;
			margin-bottom: 0;
		}
	</style>
	<script src="https://cdn.jsdelivr.net/npm/@editorjs/editorjs@latest"></script>
	<div id="editor" class="w-full pt-8 shadow-lg md:w-11/12 lg:w-9/12 xl:w-7/12 2xl:w-6/12 prose max-w-none">
	</div>

	@include("components.modals.editor-settings")
	<script>
		// Fetches scripts dynamically
		$.getMultiScripts = (arr, path) => {
			var _arr = $.map(arr, (scr) => {
				return $.getScript((path||"") + scr );
			});
			_arr.push($.Deferred((deferred) => {
				$(deferred.resolve);
			}));
			return $.when.apply($, _arr);
		};
		
		$(() => {
			$.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                }
            });
			$.ajaxPrefilter(function (options) {
				if (options.type === 'GET' && options.dataType === 'script') {
					options.cache = true;
				}
			});
			var scripts = [
				"editorjs@latest",
				"header@latest",
				"list@latest",
				"delimiter@latest",
				"marker@latest",
				"link@latest",
				"image@latest"
			];
			var sendSavedData = async (editor) => {
				$("#changes-saved-text, #saving-text").toggleClass("hidden flex");
				editor.save().then((data) => {
					var title = $("#title-input").val();
					document.title = title + " | CPlusPatch's WebMaker";
					$.post({
						url: "/post/{{ $uuid }}",
						data: {
							title: title,
							content: data,
							visibility: $("select.visibility-selection").val(),
							banner: $("input.banner-selection").val(),
							_method: "PATCH",
						}
					}).then((res) => {
						console.log("Data saved successfully");
						$("#changes-saved-text, #saving-text").toggleClass("hidden flex");
					}).catch((err) => {
						console.error(err);
					});
				})
			}
			$.getMultiScripts(scripts, "https://cdn.jsdelivr.net/npm/@editorjs/").done(() => {
				$.get({
					url: "/post/{{ $uuid }}"
				}).then((res) => {
					$("#title-input").val(res.title)
					$("select.visibility-selection").val(res.visibility);
					$("input.banner-selection").val(res.banner);
					$("[data-toggle='editor-settings']").click(() => {
						$("#editor-settings-modal").trigger("modal:toggle");
					});
					document.title = res.title + " | CPlusPatch's WebMaker";
					const editor = new EditorJS({
						holder: 'editor',
						data: JSON.parse(res.content),
						onReady: () => {
							$("#title-input").on("change", () => { sendSavedData(editor) });
							$("#editor").removeClass("animate-pulse bg-gray-200");
						},
						onChange: () => {
							sendSavedData(editor);
						},
						tools: { 
							header: Header,
							list: {
								class: List,
								inlineToolbar: true,
							},
							delimiter: Delimiter,
							image: {
							class: ImageTool,
								config: {
									endpoints: {
										byFile: '/cdn/upload', // Your backend file uploader endpoint
										byUrl: '/cdn/url', // Your endpoint that provides uploading by Url
									},
									additionalRequestHeaders: {
										'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
									}
								}
							},
							/*
							quote: {
								class: Quote,
								inlineToolbar: true,
								shortcut: 'CMD+SHIFT+O',
							}, */
							Marker: {
								class: Marker,
								shortcut: 'CMD+SHIFT+M',
							},
							linkTool: {
								class: LinkTool,
							},
							/* warning: {
								class: Warning,
								inlineToolbar: true,
								shortcut: 'CMD+SHIFT+W',
							}, */
						},
					});
					$("#title-input").on("change", function () {
						sendSavedData(editor);
					})
					$("#editor-settings-modal").on("modal:confirm", function () {
						$(this).trigger("modal:toggle");
						sendSavedData(editor);
					});
				}).catch((err) => {
					snackbar("There was an error loading the editor. Please try again.");
					console.error(err);
				});
			})
		});
	</script>
</x-editor-layout>