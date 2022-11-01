@props(['model', 'label', 'value'])

<div class="flex items-center space-x-2">
    <input wire:model="{{ $model }}"
        aria-describedby="{{ $label }}"
        name="{{ $model }}"
        type="checkbox"
        value="{{ $value }}"
        class="w-4 h-4 border-gray-300 rounded text-primary-600 focus:ring-primary-500">
    <label for="{{ $model }}"
        class="block text-sm font-medium text-gray-700">
        {{ $label }}
    </label>
</div>
