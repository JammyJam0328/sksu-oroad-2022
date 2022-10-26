@props(['to', 'active' => false, 'label', 'icon'])
<a href="{{ $to }}"
    @class([
        'flex items-center px-4 py-2 rounded-md space-x-2 text-sm font-medium  group',
        'text-white bg-primary-600  shadow' => $active,
        'text-gray-50 hover:bg-green-600 duration-300 hover:shadow-md hover:text-white' => !$active,
    ])>
    <x-dynamic-component :component="$icon"
        class="w-6 h-6" />
    <span>
        {{ $label }}
    </span>
</a>
