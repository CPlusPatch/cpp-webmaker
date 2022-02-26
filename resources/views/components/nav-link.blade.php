@props(['active', "textColor" => "black"])

@php
$classes = ($active ?? false)
            ? "inline-flex items-center px-1 pt-1 border-b-2 border-indigo-400 text-sm font-bold leading-5 text-$textColor focus:outline-none focus:border-indigo-700 transition duration-150 ease-in-out"
            : "inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-bold leading-5 text-$textColor hover:border-gray-300 hover:border-gray-900 focus:outline-none focus:text-gray-700 focus:text-$textColor focus:border-gray-300 transition duration-150 ease-in-out";
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
