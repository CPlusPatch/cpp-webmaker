<div class="overflow-hidden shadow-lg rounded-lg h-90 w-60 md:w-80 cursor-pointer m-auto duration-200 hover:scale-105">
    <a href="#" class="w-full block h-full">
        <img alt="blog photo" src="{{ $imgSrc }}" class="max-h-40 w-full object-cover"/>
        <div class="bg-white dark:bg-gray-800 w-full p-4">
            <p class="text-indigo-500 text-md font-medium">
                Article
            </p>
            <p class="text-gray-800 dark:text-white text-xl font-medium mb-2">
                {{ $title }}
            </p>
            <p class="text-gray-400 dark:text-gray-300 font-light text-md">
                {{ $description }}
            </p>
            <div class="flex items-center mt-4">
                <div class="block relative">
                    <img alt="profil" src="/cdn/9fd1f5b2-b011-41d7-aebd-faebb7472938.jpg" class="mx-auto object-cover rounded-full h-10 w-10 "/>
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
        </div>
    </a>
</div>
