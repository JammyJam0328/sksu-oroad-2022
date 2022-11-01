<div>
    <div class="flex flex-col space-y-4">
        <div class="flex justify-between">
            <div class="flex items-center space-x-3">
                <x-shared.search-input wire:model.debounce.500ms="search" />
                <x-filter label="By Status : {{ $filter_name ?? 'All Records' }}">
                    <x-filter.item wire:click="clearStatusFilter"
                        active="{{ $filter_status == null }}">
                        All Records
                    </x-filter.item>
                    @foreach ($statuses as $status)
                        <x-filter.item wire:click="selectStatusFilter({{ $status->id }},'{{ $status->name }}')"
                            active="{{ $status->id == $filter_status }}">
                            {{ $status->name }}
                        </x-filter.item>
                    @endforeach
                </x-filter>
            </div>
            <div class="flex space-x-2">
                <x-wire-button label="Export"
                    loadingOn="test">
                    <x-slot:icon>
                        <svg xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke-width="1.5"
                            stroke="currentColor"
                            class="h-5 w-5">
                            <path stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5M16.5 12L12 16.5m0 0L7.5 12m4.5 4.5V3" />
                        </svg>
                    </x-slot:icon>
                </x-wire-button>
            </div>
        </div>
        <x-table :headers="['code', 'full name', 'campus', 'document', '']">
            @forelse ($request_applications as $request_application)
                <x-table.row>
                    <x-table.data>
                        {{ $request_application->code }}
                    </x-table.data>
                    <x-table.data>
                        {{ $request_application->first_name . ' ' . $request_application->middle_name . ' ' . $request_application->last_name }}
                    </x-table.data>
                    <x-table.data>
                        {{ $request_application->campus->name }}
                    </x-table.data>
                    <x-table.data>
                        {{ $request_application->request_document->document->name }}
                    </x-table.data>
                    <x-table.data>
                        <div class="flex justify-end">
                            <a href="{{ route('registrar.view-request', ['id' => $request_application->id]) }}">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke-width="3"
                                    stroke="currentColor"
                                    class="h-5 w-5 text-gray-500 hover:text-green-500">
                                    <path stroke-linecap="round"
                                        stroke-linejoin="round"
                                        d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                                </svg>
                            </a>
                        </div>
                    </x-table.data>
                </x-table.row>
            @empty
                <x-table.empty />
            @endforelse
            <x-slot:pagination>
                {{ $request_applications->links() }}
            </x-slot:pagination>
        </x-table>
    </div>
</div>
