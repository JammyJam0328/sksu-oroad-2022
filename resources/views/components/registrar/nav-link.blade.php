@props(['to', 'active' => false, 'label', 'icon'])
<a href="{{ $to }}"
    @class([
        'flex items-center px-3 py-3  space-x-2 text-sm   group',
        'text-green-600 font-bold' => $active,
        'text-gray-500 hover:text-green-600' => !$active,
    ])>
    <x-dynamic-component :component="$icon"
        class="w-6 h-6" />
    <span>
        {{ $label }}
    </span>
</a>
