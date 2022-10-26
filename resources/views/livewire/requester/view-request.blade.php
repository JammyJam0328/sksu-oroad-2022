<div class="grid gap-4 mb-10">
    @if ($this->requestApplication->isApproved())
        <div class="my-3 overflow-hidden bg-white border border-blue-400 shadow sm:rounded-lg">
            <div class="px-4 py-5 sm:px-6">
                <h3 class="text-lg font-bold leading-6 text-blue-900">
                    Payment
                </h3>
            </div>
            <div class="px-4 py-5 border-t border-gray-200 sm:p-0">
                <dl class="sm:divide-y sm:divide-gray-200">
                    <div class="py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:py-5 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">
                            Summary
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">
                            <dl class="px-4 py-2 space-y-6 sm:px-6">
                                <div class="flex items-center justify-between">
                                    <dt class="text-sm">
                                        Total Document Amount
                                    </dt>
                                    <dd class="flex items-center space-x-2 text-sm font-medium text-gray-900">
                                        <span>
                                            ₱ {{ $this->requestApplication->payment->amount }}
                                        </span>
                                    </dd>
                                </div>
                                <div class="flex items-center justify-between">
                                    <dt class="text-sm">
                                        Additional Fee
                                    </dt>
                                    <dd class="text-sm font-medium text-gray-900">
                                        ₱ {{ $this->requestApplication->payment->additional_fee }}
                                    </dd>
                                </div>
                                <div class="flex items-center justify-between pt-6 border-t border-gray-200">
                                    <dt class="text-base font-medium">Total</dt>
                                    <dd class="text-base font-medium text-gray-900">
                                        ₱ {{ $this->requestApplication->payment->total_amount }}
                                    </dd>
                                </div>
                            </dl>
                        </dd>
                    </div>
                    <div class="py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:py-5 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">
                            Copy
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">
                            {{ $this->requestApplication->request_document->copy . ' ' . Str::plural('copy', $this->requestApplication->request_document->copy) }}
                        </dd>
                    </div>
                    <div class="py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:py-5 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">
                            With Authentication
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">
                            {{ $this->requestApplication->request_document->with_authentication ? 'Yes' : 'No' }}
                        </dd>
                    </div>
                    <div class="py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:py-5 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">
                            Reference Number
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">
                            <x-input wire:model.defer="reference_number" hint="Reference number from the reciept" />
                        </dd>
                    </div>
                    <div class="py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:py-5 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">
                            Upload Payment Proof
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">
                            <x-input wire:model="images" type="file" multiple />
                            <div wire:key="images_selected" class="mt-2">
                                @foreach ($images as $key => $image)
                                    <span
                                        class="inline-flex items-center rounded-full bg-primary-100 py-0.5 pl-2.5 pr-1 text-sm font-medium text-primary-700">
                                        Image {{ $key + 1 }}
                                        <a href="{{ $image->temporaryUrl() }}" type="button" target="_blank"
                                            class="ml-0.5 inline-flex h-4 w-4 flex-shrink-0 items-center justify-center rounded-full text-primary-600 hover:bg-primary-200 hover:text-primary-500 focus:bg-primary-500 focus:text-white focus:outline-none">
                                            <span class="sr-only">Remove large option</span>
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="w-3 h-3">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M4.5 19.5l15-15m0 0H8.25m11.25 0v11.25" />
                                            </svg>
                                        </a>
                                    </span>
                                @endforeach
                            </div>
                            <div wire:key="upload-loading">
                                <div wire:loading wire:target="images">
                                    <span>
                                        Loading...
                                    </span>
                                </div>
                            </div>
                        </dd>
                    </div>
                    <div class="flex justify-end py-4 bg-gray-100 sm:py-3 sm:px-6">
                        <x-button wire:click="submitPayment" primary label="Submit" />
                    </div>
                </dl>
            </div>
        </div>
    @endif
    @if ($this->requestApplication->isForRelease())
        <x-shared.alert
            message="Your document is ready to claim. Please claim on  {{ Carbon\Carbon::parse($this->requestApplication->retrieval_date)->format('F d, Y') }} ({{ Carbon\Carbon::parse($this->requestApplication->retrieval_date)->diffForHumans() }})." />
    @endif
    <div class=" overflow-hidden bg-white border shadow sm:rounded-lg border-primary-400">
        <div class="px-4 py-5 sm:px-6">
            <h3 class="text-lg font-bold leading-6 text-gray-900">
                Request Information
            </h3>
        </div>
        <div class="px-4 py-5 border-t border-gray-200 sm:p-0">
            <dl class="sm:divide-y sm:divide-gray-200">
                <div class="py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:py-5 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">
                        Code
                    </dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">
                        {{ $this->requestApplication->code }}
                    </dd>
                </div>
                <div class="py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:py-5 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">
                        Status
                    </dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">
                        <x-shared.status-badge :status_id="$this->requestApplication->status_id">
                            {{ $this->requestApplication->status->name }}
                        </x-shared.status-badge>
                    </dd>
                </div>
                <div class="py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:py-5 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">
                        Purpose
                    </dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">
                        {{ $this->requestApplication->purpose->name }}
                    </dd>
                </div>
                <div class="py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:py-5 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">
                        Other Purpose
                    </dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">
                        {{ $this->requestApplication->other_purpose }}
                    </dd>
                </div>
                <div class="py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:py-5 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">
                        Document
                    </dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">
                        {{ $this->requestApplication->request_document->document->name }}
                    </dd>
                </div>
                <div class="py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:py-5 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">
                        Transaction Log
                    </dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">
                        <x-shared.transaction-logs :logs="$this->requestApplication->transaction_logs" />
                    </dd>
                </div>
            </dl>
        </div>
    </div>
</div>
