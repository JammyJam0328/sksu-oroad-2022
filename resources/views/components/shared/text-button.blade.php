@props(['label' => null, 'icon' => null])
<button class="text-sm flex justify-between space-x-1 text-gray-600 hover:text-gray-800 hover:underline rounded-xl">
    @if ($icon)
        {{ $icon }}
    @endif
    @if ($label)
        <span>{{ $label }}</span>
    @endif
</button>
