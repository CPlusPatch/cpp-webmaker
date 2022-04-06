<x-guest-layout>
	<link href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.min.css" rel="stylesheet"/>
	<div id="blog-hero" class="relative w-screen h-[60vh] overflow-hidden bg-fixed bg-center bg-no-repeat bg-cover" style="background-image: url('https://media.wired.com/photos/5c6f46d93e8add2cdb917279/master/w_2400,c_limit/spaceshuttle.jpg')">
		<div class="flex items-center justify-center w-full h-full bg-black bg-opacity-25">
			<h1 class="text-4xl font-black text-white md:text-6xl font-open-sans">CPlusPatch's Blog</h1>
		</div>
		<div class="absolute flex justify-center w-full h-4 bottom-8">
			<div class="w-full max-w-7xl sm:px-6 lg:px-8">
				<button class="inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-black uppercase transition-all duration-150 ease-in-out bg-white border border-transparent rounded-md hover:bg-gray-100 hover:scale-105 active:bg-gray-200 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25">
					<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
						class="mr-2 bi bi-file-earmark-post" viewBox="0 0 16 16">
						<path
							d="M14 4.5V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h5.5L14 4.5zm-3 0A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V4.5h-2z" />
						<path
							d="M4 6.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-.5.5h-7a.5.5 0 0 1-.5-.5v-7zm0-3a.5.5 0 0 1 .5-.5H7a.5.5 0 0 1 0 1H4.5a.5.5 0 0 1-.5-.5z" />
					</svg>
					Change image
				</button>
			</div>
		</div>
	</div>
    <div class="relative flex flex-row w-full px-6 mx-auto mt-4 max-w-7xl lg:px-8">
        <h1 class="text-2xl font-semibold">Recent posts</h1>
    </div>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            @livewire("latest-posts")
        </div>
    </div>

	{{-- <x-modal width="96">
		<div class="w-full h-full text-center">
			<div class="flex flex-col justify-between h-full">
				<svg width="40" height="40" class="w-12 h-12 m-auto mt-4 text-indigo-500" fill="currentColor" viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg">
					<path d="M704 1376v-704q0-14-9-23t-23-9h-64q-14 0-23 9t-9 23v704q0 14 9 23t23 9h64q14 0 23-9t9-23zm256 0v-704q0-14-9-23t-23-9h-64q-14 0-23 9t-9 23v704q0 14 9 23t23 9h64q14 0 23-9t9-23zm256 0v-704q0-14-9-23t-23-9h-64q-14 0-23 9t-9 23v704q0 14 9 23t23 9h64q14 0 23-9t9-23zm-544-992h448l-48-117q-7-9-17-11h-317q-10 2-17 11zm928 32v64q0 14-9 23t-23 9h-96v948q0 83-47 143.5t-113 60.5h-832q-66 0-113-58.5t-47-141.5v-952h-96q-14 0-23-9t-9-23v-64q0-14 9-23t23-9h309l70-167q15-37 54-63t79-26h320q40 0 79 26t54 63l70 167h309q14 0 23 9t9 23z">
					</path>
				</svg>
				<p class="mt-4 text-xl font-bold text-gray-800">
					Upload file
				</p>
				<p class="px-6 py-2 text-xs text-gray-600">
					Drop a file below to upload it and set it as your banner
				</p>
				<input type="file" class="mt-2 filepond" name="image" data-max-file-size="5MB" data-max-files="1" accept="image/png, image/jpeg, image/gif, image/jpg, image/webp"/>
				<div class="flex items-center justify-between w-full gap-4 mt-4">
					<button type="button" class="w-full px-4 py-2 text-base font-semibold text-center text-indigo-500 transition duration-200 ease-in bg-white rounded-lg shadow-md hover:bg-gray-100 focus:ring-indigo-500 focus:ring-offset-indigo-200 focus:outline-none focus:ring-2 focus:ring-offset-2 ">
						Cancel
					</button>
					<button type="button" class="w-full px-4 py-2 text-base font-semibold text-center text-white transition duration-200 ease-in bg-indigo-600 rounded-lg shadow-md hover:bg-indigo-700 focus:ring-indigo-500 focus:ring-offset-indigo-200 focus:outline-none focus:ring-2 focus:ring-offset-2 ">
						Upload
					</button>
				</div>
			</div>
		</div>
	</x-modal> --}}
	<script src="https://unpkg.com/filepond-plugin-file-encode/dist/filepond-plugin-file-encode.min.js"></script>
	<script src="https://unpkg.com/filepond-plugin-file-validate-size/dist/filepond-plugin-file-validate-size.min.js"></script>
	<script src="https://unpkg.com/filepond-plugin-image-exif-orientation/dist/filepond-plugin-image-exif-orientation.min.js"></script>
	<script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.min.js"></script>
	<script src="https://unpkg.com/filepond-plugin-file-validate-type/dist/filepond-plugin-file-validate-type.js"></script>
	<script src="https://unpkg.com/filepond/dist/filepond.min.js"></script>
	<script>
		$(() => {
			$.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
			FilePond.registerPlugin(
				FilePondPluginImagePreview,
				FilePondPluginImageExifOrientation,
				FilePondPluginFileValidateSize,
				FilePondPluginFileValidateType
			);
			const pond = FilePond.create($('input[type="file"]')[0], {
				server: ""
			});
		});
	</script>
</x-guest-layout>
