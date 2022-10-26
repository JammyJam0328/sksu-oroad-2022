<div>
    <div x-data="{ show: false }"
        class="relative">
        <button x-on:click="show=!show"
            class="p-2 text-gray-400 rounded-md bg-gray-50 hover:text-green-500 relative">
            <svg xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 24 24"
                fill="currentColor"
                class="w-6 h-6">
                <path fill-rule="evenodd"
                    d="M5.25 9a6.75 6.75 0 0113.5 0v.75c0 2.123.8 4.057 2.118 5.52a.75.75 0 01-.297 1.206c-1.544.57-3.16.99-4.831 1.243a3.75 3.75 0 11-7.48 0 24.585 24.585 0 01-4.831-1.244.75.75 0 01-.298-1.205A8.217 8.217 0 005.25 9.75V9zm4.502 8.9a2.25 2.25 0 104.496 0 25.057 25.057 0 01-4.496 0z"
                    clip-rule="evenodd" />
            </svg>
            @if (count(auth()->user()->unreadNotifications))
                <div
                    class="py-0.5 px-1 absolute animate-bounce -top-1 text-xs -right-2 rounded-full text-white bg-red-600">
                    {{ count(auth()->user()->unreadNotifications) }}
                </div>
            @endif
        </button>
        <div x-cloak
            x-show="show"
            x-transition
            x-on:click.away="show=false"
            class="absolute right-0 z-20 mt-2 h-96 overflow-hidden bg-white border rounded-md shadow-lg resize-y"
            style="width:20rem;">
            <div class="p-3">
                <h1 class="text-gray-700 font-semibold">
                    Notifications
                </h1>
            </div>
            <div class="py-2 h-full divide-y divide-gray-200 overflow-y-auto ">
                @forelse ($notifications as $notification)
                    <a wire:key="{{ $notification->id }}"
                        href="{{ $notification->data['link'] }}?from={{ $notification->id }}"
                        class="flex items-center   -mx-2 hover:bg-gray-100">

                        <p
                            class="mx-2 text-sm  border-l-4 px-4 py-3  text-gray-600 {{ $notification->read_at ? 'border-transparent' : ' border-green-600' }} ">
                            <span class="font-bold"
                                href="#">
                                {{ $notification->data['title'] }}
                            </span> {{ $notification->data['message'] }}
                        </p>
                    </a>
                @empty
                    <div class="px-4 py-2 h-full flex justify-center items-center text-gray-500 ">
                        <div>
                            No notifications
                        </div>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</div>
