<div>
    @destination($this->request_application->destination_campus_id)
        <div class="grid max-w-full grid-cols-1 gap-6 mx-auto sm:px-6 lg:grid-flow-col-dense lg:grid-cols-3">
            <div wire:key="main-content"
                class="space-y-6 lg:col-span-2 lg:col-start-1">
                <section aria-labelledby="applicant-information-title">
                    @include('requester.sub-views.application-details')
                </section>
            </div>
            <section wire:key="information-details"
                aria-labelledby="timeline-title"
                class="lg:col-span-1 lg:col-start-3">
                <x-shared.card>
                    <x-slot:header>
                        <div class="flex justify-between">
                            <div>
                                <h1>
                                    Applicant Information
                                </h1>
                            </div>
                        </div>
                    </x-slot:header>
                    <div class="grid gap-3 text-sm uppercase">
                        <x-registrar.info label="Student Status"
                            value="{{ $this->request_application->student_status->name }}" />
                        <x-registrar.info label="Student ID"
                            value="{{ $this->request_application->student_id }}" />
                        <x-registrar.info label="Full Name"
                            value="{{ $this->request_application->first_name . ' ' . $this->request_application->middle_name . ' ' . $this->request_application->last_name . ' ' . $this->request_application->extension_name }}" />
                        <x-registrar.info label="Sex"
                            value="{{ $this->request_application->sex }}" />
                        <x-registrar.info label="Birth Date"
                            value="{{ $this->request_application->birth_date }}" />
                        <x-registrar.info label="Address"
                            value="{{ $this->request_application->address }}" />
                        <x-registrar.info label="Contact"
                            value="{{ $this->request_application->contact_number }}" />
                        <x-registrar.info label="Campus"
                            value="{{ $this->request_application->campus->name }}" />
                        <x-registrar.info label="Program"
                            value="{{ $this->request_application->program->name }}" />
                        <x-registrar.info label="Valid id">
                            <a href="{{ Storage::url($this->request_application->valid_id) }}"
                                target="_blank"
                                class="flex items-center space-x-2"><span>View</span><svg xmlns="http://www.w3.org/2000/svg"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke-width="1.5"
                                    stroke="currentColor"
                                    class="w-5 h-5 text-blue-600">
                                    <path stroke-linecap="round"
                                        stroke-linejoin="round"
                                        d="M13.5 6H5.25A2.25 2.25 0 003 8.25v10.5A2.25 2.25 0 005.25 21h10.5A2.25 2.25 0 0018 18.75V10.5m-10.5 6L21 3m0 0h-5.25M21 3v5.25" />
                                </svg>
                            </a>
                        </x-registrar.info>
                    </div>
                </x-shared.card>
            </section>
            <div wire:key="modals">
                @if ($this->request_application->paymentSubmitted())
                    <x-modal.card wire:model.defer="showPaymentValidationModal"
                        title="Payment Validation">
                        <x-shared.description label="Reference Number"
                            description=" {{ $this->request_application->payment->reference_number }}" />
                        <x-shared.description label="Proof Of Payment">
                            @foreach ($this->request_application->payment->proofs as $key => $image)
                                <span
                                    class="inline-flex items-center rounded-full bg-primary-100 py-0.5 pl-2.5 pr-1 text-sm font-medium text-primary-700">
                                    Image {{ $key + 1 }}
                                    <a href="{{ Storage::url($image->file_path) }}"
                                        type="button"
                                        target="_blank"
                                        class="ml-0.5 inline-flex h-4 w-4 flex-shrink-0 items-center justify-center rounded-full text-primary-600 hover:bg-primary-200 hover:text-primary-500 focus:bg-primary-500 focus:text-white focus:outline-none">
                                        <span class="sr-only">Remove large option</span>
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            fill="none"
                                            viewBox="0 0 24 24"
                                            stroke-width="1.5"
                                            stroke="currentColor"
                                            class="w-3 h-3">
                                            <path stroke-linecap="round"
                                                stroke-linejoin="round"
                                                d="M4.5 19.5l15-15m0 0H8.25m11.25 0v11.25" />
                                        </svg>
                                    </a>
                                </span>
                            @endforeach
                        </x-shared.description>
                        <x-shared.description label="Retrieval Date">
                            <x-input type="date"
                                wire:model="retrieval_date" />
                        </x-shared.description>
                        <x-shared.description label="Remarks">
                            <x-textarea wire:model="remarks" />
                        </x-shared.description>
                        <x-slot:footer>
                            <div class="flex justify-end space-x-4">
                                <x-button wire:click="denyPayment"
                                    negative>
                                    Deny
                                </x-button>
                                <x-button wire:click="approvePayment"
                                    spinner="approvePayment"
                                    primary>
                                    Approve
                                </x-button>
                            </div>
                        </x-slot:footer>
                    </x-modal.card>
                @endif
            </div>
        </div>
    @enddestination
</div>
