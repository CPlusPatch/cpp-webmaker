<x-app-layout>
    <x-slot name="header">
        <h2 class="flex items-center text-xl font-semibold leading-tight text-gray-800 dark:text-white grow">
            {{ $post->title }}
        </h2>
    </x-slot>

    <div class="py-12">
        <article class="prose mx-auto max-w-7xl sm:px-6 lg:px-8">
            @php
			try {
				$content = new SyntaxPhoenix\EJSParserBundle\Parser\EditorjsParser(json_decode($post->content));
				$content = $content->toHtml();
			} catch (Exception $e) {
				$content = $e;
			}
			@endphp
			{!! $content !!}
        </article>
    </div>
</x-app-layout>
