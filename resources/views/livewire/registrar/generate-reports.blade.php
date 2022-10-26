<div x-data
    class="grid space-y-5">
    <x-shared.card>
        <div class="flex justify-between items-center">
            <div class="flex items-center space-x-3">
                <div class="flex space-x-2 items-center">
                    <label>
                        Date From
                    </label>
                    <x-input type="date"
                        wire:model="date_range.from" />
                </div>
                <div class="flex space-x-2 items-center">
                    <label>
                        Date To
                    </label>
                    <x-input type="date"
                        wire:model="date_range.to" />
                </div>
                <div class="flex space-x-2 items-center">
                    <label>
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
                <x-button icon="printer"
                    x-on:click="printOut($refs.printContainer.outerHTML);"
                    gray
                    label="Print" />
            </div>
        </div>
    </x-shared.card>
    <x-shared.card>
        <x-slot:header>
            <div class="flex justify-between items-center">
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
                    <div class=" flex justify-between">
                        <div class="flex space-x-3 w-full">
                            <img src="{{ asset('images/sksu-logo.png') }}"
                                class="h-16">
                            <div class="grid gap1">
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
