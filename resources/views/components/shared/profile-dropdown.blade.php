<div id="profile-dropdown" x-data="{ isOpen: false }" class="relative ml-3">
    <div>
        <button type="button" x-on:click="isOpen = !isOpen"
            class="flex items-center space-x-1 text-sm text-gray-500 bg-white rounded-full focus:outline-none hover:text-gray-600"
            id="user-menu-button" aria-expanded="false" aria-haspopup="true">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975m11.963 0a9 9 0 10-11.963 0m11.963 0A8.966 8.966 0 0112 21a8.966 8.966 0 01-5.982-2.275M15 9.75a3 3 0 11-6 0 3 3 0 016 0z" />
            </svg>
            <span class="hidden sm:block">{{ auth()->user()->name }}</span>
        </button>
    </div>
    <div x-cloak x-show="isOpen" x-on:click.away="isOpen=false" x-transition
        class="absolute right-0 z-10 w-48 py-1 mt-2 origin-top-right bg-white rounded-md shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none"
        role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">
        <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1"
            id="user-menu-item-1">Settings</a>
        <form method="POST" action="{{ route('logout') }}" x-data>
            @csrf
            <x-jet-dropdown-link class="block px-4 py-2 text-sm text-gray-700" href="{{ route('logout') }}"
                @click.prevent="$root.submit();">
                {{ __('Sign out') }}
            </x-jet-dropdown-link>
        </form>
    </div>
</div>
