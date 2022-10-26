<div>
    <div class="flex justify-center">
        <div class="grid gap-3" x-animate>
            <x-native-select label="With Authentication" wire:model.debounce="selectedDocument.with_authentication">
                <option value="1">Yes</option>
                <option value="0">No</option>
            </x-native-select>
            <div>
                <x-input label="Copy(s)" wire:model.debounce="selectedDocument.copy" type="number" />
            </div>
            <x-native-select label="Purpose" wire:model="purpose_id">
                <option value="">Select</option>
                @foreach ($purposes as $purpose)
                    <option value="{{ $purpose->id }}">{{ $purpose->name }}</option>
                @endforeach
            </x-native-select>
            <div x-animate>
                @if ($purpose_id == 7)
                    <x-input label="Other Purpose" wire:model.debounce="other_purpose" />
                @endif
            </div>
        </div>
    </div>
</div>
