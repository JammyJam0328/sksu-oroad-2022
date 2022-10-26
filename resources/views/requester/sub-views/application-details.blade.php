<x-shared.card>
    <x-slot:header>
        <div class="flex items-center justify-between">
            <div>
                <h1>
                    Application Details
                </h1>
            </div>
            <div>
                <x-shared.text-button label="Print">
                    <x-slot:icon>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5">
                            <path fill-rule="evenodd"
                                d="M7.875 1.5C6.839 1.5 6 2.34 6 3.375v2.99c-.426.053-.851.11-1.274.174-1.454.218-2.476 1.483-2.476 2.917v6.294a3 3 0 003 3h.27l-.155 1.705A1.875 1.875 0 007.232 22.5h9.536a1.875 1.875 0 001.867-2.045l-.155-1.705h.27a3 3 0 003-3V9.456c0-1.434-1.022-2.7-2.476-2.917A48.716 48.716 0 0018 6.366V3.375c0-1.036-.84-1.875-1.875-1.875h-8.25zM16.5 6.205v-2.83A.375.375 0 0016.125 3h-8.25a.375.375 0 00-.375.375v2.83a49.353 49.353 0 019 0zm-.217 8.265c.178.018.317.16.333.337l.526 5.784a.375.375 0 01-.374.409H7.232a.375.375 0 01-.374-.409l.526-5.784a.373.373 0 01.333-.337 41.741 41.741 0 018.566 0zm.967-3.97a.75.75 0 01.75-.75h.008a.75.75 0 01.75.75v.008a.75.75 0 01-.75.75H18a.75.75 0 01-.75-.75V10.5zM15 9.75a.75.75 0 00-.75.75v.008c0 .414.336.75.75.75h.008a.75.75 0 00.75-.75V10.5a.75.75 0 00-.75-.75H15z"
                                clip-rule="evenodd" />
                        </svg>
                    </x-slot:icon>
                </x-shared.text-button>
            </div>
        </div>
    </x-slot:header>
    <div class="grid gap-4">
        <dl wire:key="content{{ $this->request_application->status_id }}" class="sm:divide-y sm:divide-gray-200">
            <x-shared.description label="Status">
                <div wire:key="{{ $this->request_application->status_id }}">
                    <x-shared.status-badge :status_id="$this->request_application->status_id"
                        message=" {{ $this->request_application->status->name }}" />
                </div>
            </x-shared.description>
            <x-shared.description label="Code" description="  {{ $this->request_application->code }}" />
            <x-shared.description label="Purpose" description="{{ $this->request_application->purpose->name }}" />
            <x-shared.description label="Transaction Logs">
                <x-shared.transaction-logs :show="false" :logs="$this->request_application->transaction_logs" />
            </x-shared.description>
            @if ($this->request_application->purpose_id == 7)
                <div class="py-2 sm:grid sm:grid-cols-3 sm:gap-4 sm:py-3 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">
                        Other Purpose
                    </dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">
                        {{ $this->request_application->other_purpose }}
                    </dd>
                </div>
            @endif
        </dl>
        <div wire:key="retrieval-date-alert" class="mt-3">
            @if ($this->request_application->isForRelease())
                <x-shared.alert
                    message="This request is for release. Retrieval Date is  {{ Carbon\Carbon::parse($this->request_application->retrieval_date)->format('F d, Y') }} ({{ Carbon\Carbon::parse($this->request_application->retrieval_date)->diffForHumans() }}).">
                    <x-button wire:click="markAsClaimed" green xs>
                        Mark as retrieved
                    </x-button>
                </x-shared.alert>
            @endif
        </div>
        <div class="grid gap-2">
            <x-shared.card>
                <x-slot:header>
                    <div class="flex justify-between">
                        <div wire:key="document-info" class="flex items-center space-x-2">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                class="w-6 h-6 text-primary-700">
                                <path
                                    d="M7.5 3.375c0-1.036.84-1.875 1.875-1.875h.375a3.75 3.75 0 013.75 3.75v1.875C13.5 8.161 14.34 9 15.375 9h1.875A3.75 3.75 0 0121 12.75v3.375C21 17.16 20.16 18 19.125 18h-9.75A1.875 1.875 0 017.5 16.125V3.375z" />
                                <path
                                    d="M15 5.25a5.23 5.23 0 00-1.279-3.434 9.768 9.768 0 016.963 6.963A5.23 5.23 0 0017.25 7.5h-1.875A.375.375 0 0115 7.125V5.25zM4.875 6H6v10.125A3.375 3.375 0 009.375 19.5H16.5v1.125c0 1.035-.84 1.875-1.875 1.875h-9.75A1.875 1.875 0 013 20.625V7.875C3 6.839 3.84 6 4.875 6z" />
                            </svg>
                            <h1 class="font-semibold text-primary-700">
                                {{ $this->request_application->request_document->document->name }}
                            </h1>
                        </div>
                        <div class="flex items-center space-x-3">
                            <span
                                class="font-semibold text-green-700">{{ $this->request_application->request_document->copy . ' ' . Str::plural('copy', $this->request_application->request_document->copy) }}</span>
                            <span>|</span>
                            <span
                                class="font-semibold text-green-700">{{ $this->request_application->request_document->with_authentication ? 'With Authentication : + ₱15 (each Copy)' : 'Without Authentication' }}</span>
                        </div>
                    </div>
                </x-slot:header>
                @if ($this->request_application->isPending())
                    <div class="grid gap-2">
                        <x-input label="Document Amount" type="number" wire:model.defer="document_amount"
                            prefix="₱"
                            hint="* {{ $this->request_application->request_document->copy . ' ' . Str::plural('copy', $this->request_application->request_document->copy) }}" />
                        <x-input label="Additional Charge" type="number" placeholder="Optional"
                            hint="Leave blank if no additional charge" prefix="₱"
                            wire:model.defer="additional_charge" />
                        <x-textarea label="Remarks" wire:model.defer="remarks" />
                    </div>
                    <x-slot:footer>
                        <div class="flex justify-end space-x-2">
                            <x-button wire:click="denyRequest" negative label="Deny" />
                            <x-button wire:click="approved" spinner="approved" primary label="Approve" />
                        </div>
                    </x-slot:footer>
                @endif
                @if ($this->request_application->inClearanceValidation())
                    <x-slot:footer>
                        <div class="w-full">
                            <x-button class="w-full" wire:click="markAsCleared" spinner="markAsCleared" warning
                                label="Cleared" />
                        </div>
                    </x-slot:footer>
                @endif
                @if (!$this->request_application->isPending() &&
                    !$this->request_application->denied() &&
                    !$this->request_application->inClearanceValidation())
                    <x-shared.description label="Document Amount"
                        description="₱ {{ $this->request_application->payment->amount }}" />
                    <x-shared.description label="Additional Fee"
                        description="₱ {{ $this->request_application->payment->additional_fee }}" />
                    <x-shared.description label="Total"
                        description="₱ {{ $this->request_application->payment->total_amount }}" />
                @endif
                <div class="pt-5">
                    @if ($this->request_application->paymentSubmitted())
                        <x-shared.alert message="Requester has submitted the payment." type="info">
                            <button type="button" wire:click="$set('showPaymentValidationModal', true)"
                                class="font-medium text-blue-700 whitespace-nowrap hover:text-blue-600">
                                Validate
                                <span aria-hidden="true"> &rarr;</span>
                            </button>
                        </x-shared.alert>
                    @endif
                </div>
            </x-shared.card>
        </div>
    </div>
</x-shared.card>
