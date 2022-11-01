@props(['label', 'value', 'border' => ''])
<div
    class="relative px-6 py-5 overflow-hidden duration-150 shadow rounded-xl bg-gradient-to-r from-green-500 via-green-600 to-green-700 hover:ring-opacity-80">
    <dt class="text-xl font-medium text-white uppercase truncate">
        {{ $label }}
    </dt>
    <dd class="mt-1 text-3xl font-semibold tracking-tight text-yellow-300">
        {{ $value }}
        {{ $slot }}
    </dd>
</div>
