<div class="m-auto overflow-hidden duration-200 rounded-lg shadow-lg cursor-pointer h-90 w-60 sm:w-80 hover:scale-105">
    <a href="/post/{{ $uuid }}/edit" class="block w-full h-full">
        @if ($image != "")
        <img alt="blog photo" src="{{ $image }}" class="object-cover w-full max-h-40"/>
        @else
        <div class="w-full h-40 bg-gray-200 animate-pulse"></div>
        @endif
        <div class="w-full p-4 bg-white dark:bg-gray-800">
            <p class="font-medium text-indigo-500 text-md">
                Article
            </p>
            <p class="mb-2 text-xl font-medium text-gray-800 dark:text-white">
                {{ $title }}
            </p>
            <div class="font-light text-gray-400 dark:text-gray-300 text-md">
                @php
                $htmlDesc = new Ankitech\LaravelEditorjsHtml\EditorJSHtml($description);
                $htmlDesc = $htmlDesc->render();
                if (strlen($htmlDesc) > 200) $htmlDesc = substr($htmlDesc, 0, 199);
                @endphp
                {!!  $htmlDesc  !!}
            </div>
            <div class="flex items-center mt-4">
                <div class="relative block">
                    <img alt="profil" src="/cdn/9fd1f5b2-b011-41d7-aebd-faebb7472938.jpg" class="object-cover w-10 h-10 mx-auto rounded-full "/>
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
