<div>
    <div x-data="{ show: false }"
        class="relative">
        <button x-on:click="show=!show"
            class="relative rounded-lg bg-green-500 p-2 text-white">
            <svg xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 24 24"
                stroke-width="1.5"
                stroke="currentColor"
                class="h-6 w-6">
                <path stroke-linecap="round"
                    stroke-linejoin="round"
                    d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0" />
            </svg>
            @if (count(auth()->user()->unreadNotifications))
                <div class="absolute top-1.5 right-2 rounded-full bg-red-500 p-1.5 text-xs">
                </div>
            @endif
        </button>
        <div x-cloak
            x-show="show"
            x-transition
            x-on:click.away="show=false"
            class="absolute right-0 z-20 mt-2 h-96 resize-y overflow-hidden rounded-md border bg-white shadow-lg"
            style="width:20rem;">
            <div class="p-3">
                <h1 class="font-semibold text-gray-700">
                    Notifications
                </h1>
            </div>
            <div class="h-full divide-y divide-gray-200 overflow-y-auto pt-2 pb-14">
                @forelse ($notifications as $notification)
                    <a wire:key="{{ $notification->id }}"
                        href="{{ $notification->data['link'] }}?from={{ $notification->id }}"
                        class="-mx-2 flex items-center hover:bg-gray-100">

                        <p
                            class="{{ $notification->read_at ? 'border-transparent' : ' border-green-600' }} mx-2 border-l-4 px-4 py-3 text-sm text-gray-600">
                            <span class="font-bold"
                                href="#">
                                {{ $notification->data['title'] }}
                            </span> {{ $notification->data['message'] }}
                        </p>
                    </a>
                @empty
                    <div class="flex h-full items-center justify-center px-4 py-2 text-gray-500">
                        <div>
                            No notifications
                        </div>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</div>
