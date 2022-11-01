<div x-data
    class="grid space-y-5">
    <div class="flex items-center justify-between">
        <div class="flex items-center space-x-3">
            <div class="flex items-center space-x-2">
                <label class="text-sm text-gray-600">
                    Date From
                </label>
                <x-form.input type="date"
                    wire:model="date_range.from" />
            </div>
            <div class="flex items-center space-x-2">
                <label class="text-sm text-gray-600">
                    Date To
                </label>
                <x-form.input type="date"
                    wire:model="date_range.to" />
            </div>
            <div class="flex items-center space-x-2">
                <label class="text-sm text-gray-600">
                    Status
                </label>
                <x-native-select wire:model="selected_status">
                    <option value="">All</option>
                    @foreach ($statuses as $status)
                        <option value="{{ $status->id }}">
                            {{ $status->name }}
                        </option>
                    @endforeach
                </x-native-select>
            </div>
        </div>
        <div class="flex items-center space-x-3">
            <x-wire-button.primary x-on:click="printOut($refs.printContainer.outerHTML);"
                label="Print">
                <x-slot:icon>
                    <svg xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke-width="1.5"
                        stroke="currentColor"
                        class="h-6 w-6">
                        <path stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M6.72 13.829c-.24.03-.48.062-.72.096m.72-.096a42.415 42.415 0 0110.56 0m-10.56 0L6.34 18m10.94-4.171c.24.03.48.062.72.096m-.72-.096L17.66 18m0 0l.229 2.523a1.125 1.125 0 01-1.12 1.227H7.231c-.662 0-1.18-.568-1.12-1.227L6.34 18m11.318 0h1.091A2.25 2.25 0 0021 15.75V9.456c0-1.081-.768-2.015-1.837-2.175a48.055 48.055 0 00-1.913-.247M6.34 18H5.25A2.25 2.25 0 013 15.75V9.456c0-1.081.768-2.015 1.837-2.175a48.041 48.041 0 011.913-.247m10.5 0a48.536 48.536 0 00-10.5 0m10.5 0V3.375c0-.621-.504-1.125-1.125-1.125h-8.25c-.621 0-1.125.504-1.125 1.125v3.659M18 10.5h.008v.008H18V10.5zm-3 0h.008v.008H15V10.5z" />
                    </svg>
                </x-slot:icon>
            </x-wire-button.primary>
        </div>
    </div>
    <x-shared.card>
        <x-slot:header>
            <div class="flex items-center justify-between">
                <span>
                    Generated Data
                </span>
                <div>

                </div>
            </div>
        </x-slot:header>
        <div class="grid gap-2">
            <div x-ref="printContainer"
                id="print">
                <div class="hidden print:block">
                    <div class="flex justify-between">
                        <div class="flex w-full space-x-3">
                            <img src="{{ asset('images/sksu-logo.png') }}"
                                class="h-16">
                            <div class="gap1 grid">
                                <h1>
                                    Republic of the Philippines
                                </h1>
                                <h1>
                                    Sultan Kudarat State University
                                </h1>
                                <h1>
                                    Province of Sultan Kudarat, 9800, City of Tacurong, Philippines
                                </h1>
                            </div>
                        </div>
                    </div>
                    <div id="details"
                        class="flex space-x-2 print:mt-5">
                        @if ($date_range['from'])
                            <span>
                                Date From: {{ Carbon\Carbon::parse($date_range['from'])->format('F d, Y') }}
                            </span>
                        @endif
                        @if ($date_range['to'])
                            <span>
                                Date To: {{ Carbon\Carbon::parse($date_range['to'])->format('F d, Y') }}
                            </span>
                        @endif
                        @if ($selected_status)
                            <span>
                                Status: {{ $statuses->find($selected_status)->name }}
                            </span>
                        @endif
                    </div>
                </div>
                <div class="print:mt-2">
                    @includeWhen($selected_type == 1, 'registrar.reports.all-request-applications')
                </div>
            </div>
        </div>
    </x-shared.card>
</div>
