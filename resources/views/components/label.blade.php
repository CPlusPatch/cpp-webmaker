@props(['value'])

<label {{ $attributes->merge(['class' => 'block font-medium text-sm text-white uppercase text-left']) }}>
    {{ $value ?? $slot }}
</label>
