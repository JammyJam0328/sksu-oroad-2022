<x-app title="Home">
    <x-requester.layout>
        <div class="w-full">
            <div class="flex items-center justify-between mb-4 sm:mb-1">
                <h1 class="text-lg font-semibold text-gray-700 uppercase">
                    Request History
                </h1>
                <a type="button" href="{{ route('requester.request-create') }}"
                    class="flex items-center px-2 space-x-1 text-green-700 rounded-lg hover:text-green-600">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span> Create Request</span>
                </a>
            </div>
            @livewire('requester.request-list')
        </div>
    </x-requester.layout>
</x-app>
