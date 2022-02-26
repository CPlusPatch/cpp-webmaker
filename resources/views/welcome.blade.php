<x-guest-layout>
    <div class="bg-gradient-to-tl from-blue-700 via-blue-800 to-gray-900 relative overflow-hidden h-screen">
		@include('layouts.navigation', ["textColor" => "white"])
        <div class="container mx-auto px-6 md:px-12 relative z-10 flex items-center py-10 xl:py-15 space-between">
            <div class="lg:w-3/5 xl:w-2/5 flex flex-col items-start relative z-10">
                <span class="font-noto-sans font-extralight uppercase text-white text-md">
                    A <strong class="font-black">CPlusPatch</strong> project
                </span>
                <h1 class="font-bold font-noto-sans text-6xl sm:text-7xl text-white leading-tight mt-4 mb-6">
                    Create your own website
                </h1>
				@auth
				<a href="/dashboard" class="py-2 px-4  bg-indigo-600 hover:bg-indigo-700 focus:ring-indigo-500 focus:ring-offset-indigo-200 text-white transition ease-in duration-150 text-center text-base font-semibold shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2 rounded-lg hover:scale-105">
					Go to Dashboard
				</a>
				@endauth
				@guest
				<a href="/register" class="py-2 px-4  bg-indigo-600 hover:bg-indigo-700 focus:ring-indigo-500 focus:ring-offset-indigo-200 text-white transition ease-in duration-150 text-center text-base font-semibold shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2 rounded-lg hover:scale-105">
					Sign up now!
				</a>
				@endguest

            </div>
			<div class="lg:w-2/5 xl:w-3/5 flex z-10 h-96 items-end flex-col-reverse">
				<div class="hidden xl:flex xl:w-3/5 m-3 rounded-lg bg-gray-300 animate-pulse h-full w-full items-center justify-center">
					<h3 class="font-black text-gray-600 text-xl flex items-center justify-center">
						<svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="h-5 w-5 mr-3" viewBox="0 0 16 16">
							<path d="M4.502 9a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z"/>
							<path d="M14.002 13a2 2 0 0 1-2 2h-10a2 2 0 0 1-2-2V5A2 2 0 0 1 2 3a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2v8a2 2 0 0 1-1.998 2zM14 2H4a1 1 0 0 0-1 1h9.002a2 2 0 0 1 2 2v7A1 1 0 0 0 15 11V3a1 1 0 0 0-1-1zM2.002 4a1 1 0 0 0-1 1v8l2.646-2.354a.5.5 0 0 1 .63-.062l2.66 1.773 3.71-3.71a.5.5 0 0 1 .577-.094l1.777 1.947V5a1 1 0 0 0-1-1h-10z"/>
						</svg>
						Demo images here
					</h3>
				</div>
			</div>
        </div>
    </div>

</x-guest-layout>
