<x-editor-layout>
	<x-slot name="header">
		<h2 class="text-xl font-semibold my-0">Editor</h2>
	</x-slot>
	<script src="https://cdn.jsdelivr.net/npm/@editorjs/editorjs@latest"></script>
	<div id="editor" class="w-full pt-5 shadow-lg md:w-11/12 lg:w-9/12 xl:w-7/12 2xl:w-6/12">
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
				"image@latest",
				"quote@latest",
				"marker@latest",
				"link@latest",
				"warning@latest"
			];
			$.getMultiScripts(scripts, "https://cdn.jsdelivr.net/npm/@editorjs/").done(() => {
				$.get({
					url: "/post/{{ $uuid }}"
				}).then((res) => {
					console.log(JSON.parse(res));
					const editor = new EditorJS({
						holder: 'editor',
						data: JSON.parse(res),
						onReady: () => {
							$("#editor").removeClass("animate-pulse bg-gray-200");
						},
						onChange: () => {
							editor.save().then((data) => {
								$.post({
									url: "/post/{{ $uuid }}",
									data: {
										content: data,
										_method: "PATCH",
									}
								}).then((res) => {
									console.log("Saved!")
								}).catch((err) => {
									console.error(err);
								});
							});
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
							},
							quote: {
								class: Quote,
								inlineToolbar: true,
								shortcut: 'CMD+SHIFT+O',
							},
							Marker: {
								class: Marker,
								shortcut: 'CMD+SHIFT+M',
							},
							linkTool: {
								class: LinkTool,
							},
							warning: {
								class: Warning,
								inlineToolbar: true,
								shortcut: 'CMD+SHIFT+W',
							},
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