<div>
    <div class="overflow-hidden bg-white border shadow sm:rounded-md">
        <ul role="list" class="divide-y divide-gray-200">
            @forelse ($request_applications as $request_application)
                <li>
                    <a href="{{ route('requester.view-request', ['id' => $request_application->id]) }}"
                        class="block hover:bg-gray-50">
                        <div class="px-4 py-4 sm:px-6">
                            <div class="flex items-center justify-between">
                                <p class="text-sm font-medium text-indigo-600 truncate">
                                    {{ $request_application->request_document->document->name }}
                                </p>
                                <div class="flex flex-shrink-0 ml-2">
                                    <x-shared.status-badge status_id="{{ $request_application->status_id }}">
                                        {{ $request_application->status->name }}
                                    </x-shared.status-badge>
                                </div>
                            </div>
                            <div class="mt-2 sm:flex sm:justify-between">
                                <div class="sm:flex">
                                    <p class="flex items-center text-sm text-gray-500">
                                        CODE : {{ $request_application->code }}
                                    </p>
                                </div>
                                <div class="flex items-center mt-2 text-sm text-gray-500 sm:mt-0">
                                    <svg class="mr-1.5 h-5 w-5 flex-shrink-0 text-gray-400"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                        aria-hidden="true">
                                        <path fill-rule="evenodd"
                                            d="M5.75 2a.75.75 0 01.75.75V4h7V2.75a.75.75 0 011.5 0V4h.25A2.75 2.75 0 0118 6.75v8.5A2.75 2.75 0 0115.25 18H4.75A2.75 2.75 0 012 15.25v-8.5A2.75 2.75 0 014.75 4H5V2.75A.75.75 0 015.75 2zm-1 5.5c-.69 0-1.25.56-1.25 1.25v6.5c0 .69.56 1.25 1.25 1.25h10.5c.69 0 1.25-.56 1.25-1.25v-6.5c0-.69-.56-1.25-1.25-1.25H4.75z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    <p>
                                        Last Update :
                                        <time datetime=" {{ $request_application->updated_at->format('d M Y') }}">
                                            {{ $request_application->updated_at->format('d M Y h:m:s A') }}</time>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </a>
                </li>
            @empty
                <li>
                    <div class="block hover:bg-gray-50">
                        <div class="px-4 py-4 sm:px-6">
                            No Request History
                        </div>
                    </div>
                </li>
            @endforelse
        </ul>
    </div>
</div>
