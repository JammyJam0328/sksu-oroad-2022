<div class="grid mb-10 space-y-3">
    <x-requester.step-navigation>
        <div>
            <button wire:click="previous" @class([
                'text-gray-400' => $currentStep == 1,
                'text-gray-700' => $currentStep != 1,
            ])>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="3"
                    stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M18.75 19.5l-7.5-7.5 7.5-7.5m-6 15L5.25 12l7.5-7.5" />
                </svg>
            </button>
        </div>
        <p class="text-sm font-medium">Step {{ $currentStep }} of {{ $totalStep }}</p>
        <div>
            <button wire:click="next" @class([
                'text-gray-400' => $currentStep == $totalStep,
                'text-gray-700' => $currentStep != $totalStep,
            ])>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="3"
                    stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M11.25 4.5l7.5 7.5-7.5 7.5m-6-15l7.5 7.5-7.5 7.5" />
                </svg>
            </button>
        </div>
    </x-requester.step-navigation>
    <div wire:key="form-container">
        <div wire:key="1">
            @if ($currentStep == 1)
                @include('requester.request.sub.select-document')
            @endif
        </div>
        <div wire:key="2">
            @if ($currentStep == 2)
                @include('requester.request.sub.more-details')
            @endif
        </div>
        <div wire:key="3">
            @if ($currentStep == 3)
                @include('requester.request.sub.reminders')
            @endif
        </div>
    </div>
</div>
