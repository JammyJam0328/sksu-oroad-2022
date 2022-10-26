<div class="grid space-y-3">
    <h1 class="font-semibold text-gray-600 uppercase">
        Select Document
    </h1>
    <fieldset class="mb-10">
        <div class="space-y-4">
            @foreach ($documents as $key => $document)
                <div wire:key="{{ $key . $document->id }}"
                    wire:click="$set('selectedDocument.document_id', {{ $document->id }})" @class([
                        'relative block px-6 py-4 bg-white border rounded-lg shadow-sm cursor-pointer focus:outline-none sm:flex sm:justify-between',
                        'border-green-500 ring-2 ring-green-500 ease-in-out duration-150' =>
                            $document->id == $selectedDocument['document_id'],
                    ])>
                    <span class="flex items-center">
                        <div class="flex items-center space-x-2 text-sm ">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                class="w-6 h-6 text-primary-600">
                                <path fill-rule="evenodd"
                                    d="M5.625 1.5c-1.036 0-1.875.84-1.875 1.875v17.25c0 1.035.84 1.875 1.875 1.875h12.75c1.035 0 1.875-.84 1.875-1.875V12.75A3.75 3.75 0 0016.5 9h-1.875a1.875 1.875 0 01-1.875-1.875V5.25A3.75 3.75 0 009 1.5H5.625zM7.5 15a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5A.75.75 0 017.5 15zm.75 2.25a.75.75 0 000 1.5H12a.75.75 0 000-1.5H8.25z"
                                    clip-rule="evenodd" />
                                <path
                                    d="M12.971 1.816A5.23 5.23 0 0114.25 5.25v1.875c0 .207.168.375.375.375H16.5a5.23 5.23 0 013.434 1.279 9.768 9.768 0 00-6.963-6.963z" />
                            </svg>
                            <div id="server-size-0-label" @class([
                                'font-medium text-green-800' =>
                                    $document->id == $selectedDocument['document_id'],
                                'font-medium text-gray-900' =>
                                    $document->id != $selectedDocument['document_id'],
                            ])>
                                {{ $document->name }}
                            </div>
                        </div>
                    </span>
                    <div id="{{ $key }}server-size-0-description-1"
                        class="flex mt-2 text-sm sm:mt-0 sm:ml-4 sm:flex-col sm:text-right" x-animate>
                        @if ($document->id == $selectedDocument['document_id'])
                            <span class="font-medium text-green-600">
                                Selected
                            </span>
                        @endif
                    </div>

                    <span @class([
                        'absolute border-2 rounded-lg pointer-events-none -inset-px',
                        'border-green-500' => $document->id == $selectedDocument['document_id'],
                    ]) aria-hidden="true"></span>
                </div>
            @endforeach
        </div>
    </fieldset>

</div>
