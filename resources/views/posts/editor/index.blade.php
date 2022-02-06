<x-editor-layout>
	<x-slot name="header">
		<a href="/dashboard" alt="Return to dashboard" class="mr-3 inline-flex items-center px-2 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-white uppercase hover:bg-blue-900 hover:scale-105 transition-all active:bg-blue-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 ease-in-out duration-150">
			<svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="w-8 h-8" viewBox="0 0 16 16">
				<path d="M1 2a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2zm5 0a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V2zm5 0a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1h-2a1 1 0 0 1-1-1V2zM1 7a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V7zm5 0a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7zm5 0a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1h-2a1 1 0 0 1-1-1V7zM1 12a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1v-2zm5 0a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1v-2zm5 0a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1h-2a1 1 0 0 1-1-1v-2z"/>
			</svg>
		</a>
		<div class="flex flex-col">
			<input id="title-input" type="text" class="p-0 text-xl border-0 appearance-none mb-1 transition-all ease-in-out duration-150 hover:outline-0 hover:border-0 ring-0 focus:ring-0 hover:bg-gray-100 rounded hover:pl-2 hover:text-gray-800" value="Editor">
			<div>
				<h5 id="changes-saved-text" class="text-gray-600 my-0 pb-1 italic">All changes have been saved</h5>
				<h5 id="saving-text" class="text-gray-600 my-0 pb-1 italic flex items-center animate-pulse hidden">
					<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cloud-arrow-up-fill pr-1" viewBox="0 0 16 16">
						<path d="M8 2a5.53 5.53 0 0 0-3.594 1.342c-.766.66-1.321 1.52-1.464 2.383C1.266 6.095 0 7.555 0 9.318 0 11.366 1.708 13 3.781 13h8.906C14.502 13 16 11.57 16 9.773c0-1.636-1.242-2.969-2.834-3.194C12.923 3.999 10.69 2 8 2zm2.354 5.146a.5.5 0 0 1-.708.708L8.5 6.707V10.5a.5.5 0 0 1-1 0V6.707L6.354 7.854a.5.5 0 1 1-.708-.708l2-2a.5.5 0 0 1 .708 0l2 2z"/>
					</svg>
					Saving...
				</h5>
			</div>
		</div>
	</x-slot>
	<script src="https://cdn.jsdelivr.net/npm/@editorjs/editorjs@latest"></script>
	<div id="editor" class="w-full pt-5 shadow-lg md:w-11/12 lg:w-9/12 xl:w-7/12 2xl:w-6/12 prose max-w-none">
	</div>
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
			];
			var sendSavedData = async (editor) => {
				$("#changes-saved-text, #saving-text").toggleClass("hidden");
				editor.save().then((data) => {
					var title = $("#title-input").val();
					$.post({
						url: "/post/{{ $uuid }}",
						data: {
							title: title,
							content: data,
							_method: "PATCH",
						}
					}).then((res) => {
						console.log("Data saved successfully");
						$("#changes-saved-text, #saving-text").toggleClass("hidden");
					}).catch((err) => {
						console.error(err);
					});
				})
			}
			$.getMultiScripts(scripts, "https://cdn.jsdelivr.net/npm/@editorjs/").done(() => {
				$.get({
					url: "/post/{{ $uuid }}"
				}).then((res) => {
					console.log(JSON.parse(res.content));
					$("#title-input").val(res.title)
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
							/* image: {
								class: ImageTool,
							},
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
				}).catch((err) => {
					snackbar("There was an error loading the editor. Please try again.");
					console.error(err);
				});
			})
		});
	</script>
</x-editor-layout>