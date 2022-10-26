<div class="flex space-x-2">
    <div class="w-72">
        <div class="px-4 py-2 bg-white border rounded-lg">
            <fieldset>
                <legend class="w-full px-2">
                    <button type="button"
                        class="flex w-full items-center justify-between p-2 text-gray-400 hover:text-gray-500"
                        aria-controls="filter-section-0" aria-expanded="false">
                        <span class="text-sm font-medium text-gray-900"> Filters</span>
                        <span class="ml-6 flex h-7 items-center">
                        </span>
                    </button>
                </legend>
                <div class="pb-2" id="filter-section-0">
                    <div class="space-y-6">
                        @foreach ($statuses as $key => $status)
                            <div wire:key="{{ $key }}" class="flex items-center">
                                <input id="{{ $key }}" wire:model="filter" wire:key="{{ $key . $status->id }}"
                                    value="{{ $status->id }}" type="checkbox" @checked(in_array($status->id, $filter))
                                    class="h-4 w-4 rounded border-gray-300 text-primary-600 focus:ring-primary-500">
                                <label class="ml-3 text-sm text-gray-500">
                                    {{ $status->name }}
                                </label>
                            </div>
                        @endforeach
                    </div>
                </div>
            </fieldset>
        </div>
    </div>
    <div class="w-full">
        <x-table :headers="['code', 'full name', 'campus', 'document', '']">
            <x-slot:menu>
                <div class="flex items-center space-x-3">
                    <x-shared.search-input />
                </div>
                <div>
                    <x-button outline green>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="h-6 fill-green-500">
                            <path fill="none" d="M0 0h24v24H0z" />
                            <path
                                d="M2.859 2.877l12.57-1.795a.5.5 0 0 1 .571.495v20.846a.5.5 0 0 1-.57.495L2.858 21.123a1 1 0 0 1-.859-.99V3.867a1 1 0 0 1 .859-.99zM17 3h4a1 1 0 0 1 1 1v16a1 1 0 0 1-1 1h-4V3zm-6.8 9L13 8h-2.4L9 10.286 7.4 8H5l2.8 4L5 16h2.4L9 13.714 10.6 16H13l-2.8-4z" />
                        </svg>
                    </x-button>
                </div>
            </x-slot:menu>
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
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="3" stroke="currentColor"
                                    class="w-5 h-5 text-gray-500 hover:text-green-500">
                                    <path stroke-linecap="round" stroke-linejoin="round"
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
