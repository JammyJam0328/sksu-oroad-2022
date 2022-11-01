@props([
    'label' => 'Filter',
])

<div x-data="{ expand: false }"
    x-on:click.away="expand = false"
    class="relative inline-block text-left">
    <div>
        <button type="button"
            x-on:click="expand = !expand"
            class="inline-flex w-full justify-center rounded-lg border border-gray-300 bg-white px-4 py-[9px] text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none"
            id="menu-button"
            aria-expanded="true"
            aria-haspopup="true">
            <span wire:key="label">
                {{ $label }}
            </span>
            <svg class="ml-1 -mr-1 h-5 w-5 duration-150"
                x-bind:class="{ 'rotate-180': expand }"
                xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 20 20"
                fill="currentColor"
                aria-hidden="true">
                <path fill-rule="evenodd"
                    d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z"
                    clip-rule="evenodd" />
            </svg>
        </button>
    </div>
    <div x-cloak
        x-show="expand"
        x-transition:enter="transition ease-out duration-100"
        x-transition:enter-start="transform opacity-0 scale-95"
        x-transition:enter-end="transform opacity-100 scale-100"
        x-transition:leave="transition ease-in duration-75"
        x-transition:leave-start="transform opacity-100 scale-100"
        x-transition:leave-end="transform opacity-0 scale-95"
        class="absolute right-0 z-10 mt-2 w-56 origin-top-right rounded-md bg-white shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none"
        role="menu"
        aria-orientation="vertical"
        aria-labelledby="menu-button"
        tabindex="-1">
        <div class="p-1"
            role="none">
            {{ $slot }}
        </div>
    </div>
</div>
