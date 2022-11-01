@props(['trigger'])

<div x-data="{ expand: false }"
    class="relative">
    <div x-on:click="expand=!expand"
        class="cursor-pointer">
        {{ $trigger }}
    </div>
    <div x-cloak
        x-show="expand"
        x-on:click.away="expand=false"
        x-transition:enter="transition ease-out duration-100"
        x-transition:enter-start="transform opacity-0 scale-95"
        x-transition:enter-end="transform opacity-100 scale-100"
        x-transition:leave="transition ease-in duration-75"
        x-transition:leave-start="transform opacity-100 scale-100"
        x-transition:leave-end="transform opacity-0 scale-95"
        class="absolute right-0 z-10 mt-2 w-56 origin-top-right divide-y divide-gray-100 rounded-md bg-white shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none"
        role="menu"
        aria-orientation="vertical"
        aria-labelledby="menu-button"
        tabindex="-1">
        {{ $slot }}
    </div>
</div>
