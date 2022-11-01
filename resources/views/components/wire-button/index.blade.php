@props([
    'label' => '',
    'type' => 'button',
    'icon' => '',
    'loadingOn' => null,
])
<button type="{{ $type }}"
    {{ $attributes }}
    wire:loading.attr="disabled"
    wire:loading.class="cursor-progress"
    class="inline-flex items-center space-x-2 rounded-lg border border-gray-300 bg-white px-4 py-[9px] text-sm font-medium text-gray-700 shadow-sm hover:bg-gray-50 hover:shadow-sm focus:outline-none disabled:text-gray-400">
    {{ $icon ?? '' }}
    <span>
        {{ $label }}
    </span>
    @if ($loadingOn)
        <span wire:loading
            wire:target="{{ $loadingOn }}">
            <svg xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 24 24"
                class="h-5 w-5 animate-spin fill-gray-600">
                <path fill="none"
                    d="M0 0h24v24H0z" />
                <path d="M18.364 5.636L16.95 7.05A7 7 0 1 0 19 12h2a9 9 0 1 1-2.636-6.364z" />
            </svg>
        </span>
    @endif
</button>
