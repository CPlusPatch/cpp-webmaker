<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css"/>

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        <script src="{{ asset('js/components.js') }}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> <!-- jQuery 3.6.0 -->
        <!-- Tailwind CDN -->
        <script src="https://cdn.tailwindcss.com"></script>

        <script>
            tailwind.config = {
                theme: {
                    extend: {
                        fontFamily: {
                            sans: ['Nunito'],
                        },
                    },
                },
                darkMode: "class",
            };
        </script>
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100 dark:bg-gray-700">
            @include('layouts.navigation')

            <!-- Page Heading -->
            <header class="bg-white shadow dark:bg-gray-800">
                <div class="flex px-4 py-6 mx-auto max-w-7xl sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
        <script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>
    </body>
</html>
