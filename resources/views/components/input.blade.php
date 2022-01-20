@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'rounded px-3 border border-gray-500 pt-2 pb-2 focus:outline-none input active:outline-none']) !!}>
