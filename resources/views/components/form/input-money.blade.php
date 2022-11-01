@props([
    'placeholder' => '0.00',
])

<div class="relative mt-1 rounded-md shadow-sm">
    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
        <span class="text-gray-500 sm:text-sm">₱</span>
    </div>
    <input type="number"
        {{ $attributes->whereStartsWith('wire:model') }}
        name="{{ $attributes->whereStartsWith('wire:model')->first() ?? '' }}"
        id="{{ $attributes->whereStartsWith('wire:model')->first() ?? '' }}"
        class="block w-full pr-12 border-gray-300 rounded-md shadow-sm pl-7 focus:border-gray-400 focus:ring-0 sm:text-sm"
        placeholder="{{ $placeholder }}"
        aria-describedby="price-currency">
    <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
        <span class="text-gray-500 sm:text-sm"
            id="price-currency">PHP</span>
    </div>
</div>
