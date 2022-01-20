<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-white leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            {{-- <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    You're logged in!
                </div>
            </div> --}}
            <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-12">
                @for ($i = 0; $i < 6; $i++)
                <x-blog.post-card-skeleton title="Template" author="Template date" date="Template date">
                    <x-slot name="description">
                        Template
                    </x-slot>
                </x-blog.post-card>
                @endfor

                {{-- <x-blog.post-card imgSrc="/cdn/a3d13a0b-e90f-45e4-9c83-d958e0f252b5.jpg" title="Borgir moment" author="CPlusPatch" date="20 Jul 4269">
                    <x-slot name="description">
                        This is a test for now
                    </x-slot>
                </x-blog.post-card> --}}
            </div>
        </div>
    </div>
</x-app-layout>
