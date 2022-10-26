@props(['label', 'value', 'border' => ''])
<div
    class="relative overflow-hidden rounded-lg ring-1 hover:ring ring-black ring-opacity-5 hover:ring-opacity-80 duration-150 hover:bg-green-50 hover:ring-green-600 bg-white px-4 py-3 shadow sm:py-3">
    <dt class="truncate  font-medium text-gray-500 uppercase">
        {{ $label }}
    </dt>
    <dd class="mt-1 text-3xl font-semibold tracking-tight text-gray-700">
        {{ $value }}
        {{ $slot }}
    </dd>
</div>
