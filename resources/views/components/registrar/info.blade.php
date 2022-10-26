@props(['label' => '', 'value' => ''])

<div class="grid gap-1">
    <h1 class="text-gray-500 ">
        {{ $label }}
    </h1>
    <h1 class="text-gray-700 underline hover:text-gray-800">
        {{ $value }}
        {{ $slot }}
    </h1>
</div>
