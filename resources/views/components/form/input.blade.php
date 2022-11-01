@props([
    'type' => 'text',
    'placeholder' => '',
])

<input type="{{ $type }}"
    {{ $attributes->whereStartsWith('wire:model') }}
    placeholder="{{ $placeholder }}"
    name="{{ $attributes->whereStartsWith('wire:model')->first() ?? '' }}"
    id="{{ $attributes->whereStartsWith('wire:model')->first() ?? '' }}"
    class="block w-full border-gray-300 rounded-md shadow-sm focus:border-gray-400 focus:ring-0 sm:text-sm">
