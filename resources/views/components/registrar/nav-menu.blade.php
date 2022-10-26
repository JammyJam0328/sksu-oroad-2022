<div class="flex space-x-3">
    @livewire('registrar.user-notification')
    <button class="p-2 text-gray-400 rounded-md bg-gray-50 hover:text-green-500">
        <svg xmlns="http://www.w3.org/2000/svg"
            viewBox="0 0 24 24"
            fill="currentColor"
            class="w-6 h-6">
            <path fill-rule="evenodd"
                d="M11.828 2.25c-.916 0-1.699.663-1.85 1.567l-.091.549a.798.798 0 01-.517.608 7.45 7.45 0 00-.478.198.798.798 0 01-.796-.064l-.453-.324a1.875 1.875 0 00-2.416.2l-.243.243a1.875 1.875 0 00-.2 2.416l.324.453a.798.798 0 01.064.796 7.448 7.448 0 00-.198.478.798.798 0 01-.608.517l-.55.092a1.875 1.875 0 00-1.566 1.849v.344c0 .916.663 1.699 1.567 1.85l.549.091c.281.047.508.25.608.517.06.162.127.321.198.478a.798.798 0 01-.064.796l-.324.453a1.875 1.875 0 00.2 2.416l.243.243c.648.648 1.67.733 2.416.2l.453-.324a.798.798 0 01.796-.064c.157.071.316.137.478.198.267.1.47.327.517.608l.092.55c.15.903.932 1.566 1.849 1.566h.344c.916 0 1.699-.663 1.85-1.567l.091-.549a.798.798 0 01.517-.608 7.52 7.52 0 00.478-.198.798.798 0 01.796.064l.453.324a1.875 1.875 0 002.416-.2l.243-.243c.648-.648.733-1.67.2-2.416l-.324-.453a.798.798 0 01-.064-.796c.071-.157.137-.316.198-.478.1-.267.327-.47.608-.517l.55-.091a1.875 1.875 0 001.566-1.85v-.344c0-.916-.663-1.699-1.567-1.85l-.549-.091a.798.798 0 01-.608-.517 7.507 7.507 0 00-.198-.478.798.798 0 01.064-.796l.324-.453a1.875 1.875 0 00-.2-2.416l-.243-.243a1.875 1.875 0 00-2.416-.2l-.453.324a.798.798 0 01-.796.064 7.462 7.462 0 00-.478-.198.798.798 0 01-.517-.608l-.091-.55a1.875 1.875 0 00-1.85-1.566h-.344zM12 15.75a3.75 3.75 0 100-7.5 3.75 3.75 0 000 7.5z"
                clip-rule="evenodd" />
        </svg>
    </button>
    <div x-data="{ show: false }"
        class="relative"
        x-animate
        x-on:click.away="show=false">
        <button x-on:click="show=!show"
            class="flex items-center space-x-2 text-gray-500">
            <img src="{{ auth()->user()->profile_photo_url }}"
                class="h-10 rounded-md"
                alt="">
            <h1>
                {{ auth()->user()->name }}
            </h1>
            <svg xmlns="http://www.w3.org/2000/svg"
                x-bind:class="{ 'duration-300 rotate-180': show, 'duration-300 rotate-0': !show }"
                viewBox="0 0 24 24"
                fill="currentColor"
                class="w-5 h-5 mt-1 ">
                <path fill-rule="evenodd"
                    d="M12.53 16.28a.75.75 0 01-1.06 0l-7.5-7.5a.75.75 0 011.06-1.06L12 14.69l6.97-6.97a.75.75 0 111.06 1.06l-7.5 7.5z"
                    clip-rule="evenodd" />
            </svg>
        </button>
        <div x-cloak
            x-show="show"
            x-collapse
            class="absolute right-0 z-10 w-56 mt-2 origin-top-right bg-white rounded-md shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none"
            role="menu"
            aria-orientation="vertical"
            aria-labelledby="menu-button"
            tabindex="-1">
            <div class="py-1"
                role="none">
                <form method="POST"
                    action="{{ route('logout') }}"
                    x-data>
                    @csrf
                    <x-jet-dropdown-link class="block px-4 py-2 text-sm text-gray-700"
                        href="{{ route('logout') }}"
                        @click.prevent="$root.submit();">
                        {{ __('Sign out') }}
                    </x-jet-dropdown-link>
                </form>
            </div>
        </div>
    </div>
</div>
