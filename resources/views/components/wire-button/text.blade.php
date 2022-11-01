@props([
    'label' => '',
    'type' => 'button',
    'icon' => '',
    'loadingOn' => null,
    'color' => 'text-gray-600',
])
<button type="{{ $type }}"
    {{ $attributes }}
    wire:loading.attr="disabled"
    wire:loading.class="cursor-progress"
    class="{{ $color }} flex items-center space-x-2">
    {{ $icon ?? '' }}
    <span>
        {{ $label }}
    </span>
</button>
