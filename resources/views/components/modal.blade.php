@props(["width" => "64"])

<div class="fixed bg-black bg-opacity-80 flex items-center justify-center w-screen h-screen top-0" style="z-index: 999999999999999;">	
	<div class="shadow-lg rounded-2xl p-4 bg-white w-{{ $width }} m-auto">
		{{ $slot }}
	</div>
</div>