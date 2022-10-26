<x-app title="View Request">
    <x-requester.layout>
        <div class="w-full">
            <div class="flex items-center justify-between mb-4 sm:mb-1">
                <h1 class="text-lg font-semibold text-gray-700 uppercase">
                    View Request
                </h1>
            </div>
            <div class="pt-2 border-t">
                @livewire('requester.view-request', ['request_id' => $request_id])
            </div>
        </div>
    </x-requester.layout>
</x-app>
