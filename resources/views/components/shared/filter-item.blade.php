@props(['active' => false])
<button {{ $attributes }} type="button" @class([
    'block px-4 py-2 text-sm w-full text-start',
    'font-bold text-gray-700' => $active,
    'hover:bg-gray-100 hover:text-gray-700  text-gray-500' => !$active,
]) role="menuitem" tabindex="-1" id="menu-item-1">
    {{ $slot }}
</button>
