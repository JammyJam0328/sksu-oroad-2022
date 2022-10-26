@props(['label' => '', 'active' => '', 'width' => 'w-64', 'selected' => ''])
<div x-data="{ show: false }" class="relative inline-block text-left">
    <div>
        <button type="button" x-on:click="show = !show" x-on:click.away="show = false"
            class="inline-flex justify-center font-medium text-gray-700 group hover:text-gray-900" aria-expanded="false"
            aria-haspopup="true" x-animate>
            <span id="label">{{ $label }}</span>
            @if ($selected != '')
                <span id="selectedText" class="ml-2"> ({{ $selected }})</span>
            @endif
            <svg x-bind:class="show ? 'rotate-180' : ''"
                class="flex-shrink-0 w-5 h-5 ml-1 -mr-1 text-gray-400 duration-150 group-hover:text-gray-500"
                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                <path fill-rule="evenodd"
                    d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z"
                    clip-rule="evenodd" />
            </svg>
        </button>
    </div>
    <div x-cloak x-show="show"
        class="absolute right-0 z-10 mt-2 {{ $width }} origin-top-right bg-white rounded-md shadow-2xl ring-1 ring-black ring-opacity-5 focus:outline-none"
        role="menu" aria-orientation="vertical" aria-labelledby="menu-button" tabindex="-1">
        <div class="w-full py-1" role="none">
            {{ $slot }}
        </div>
    </div>
</div>
