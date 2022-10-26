<div class="grid space-y-3">
    <h1 class="font-semibold text-gray-600 uppercase ">
        Information
    </h1>
    <div class="mb-10">
        <form>
            @csrf
            <div class="gap-3 grid sm:grid-cols-2"
                x-animate>
                <x-input label="Student ID"
                    wire:model.defer="information.student_id"
                    placeholder="Optional" />
                <x-native-select label="Student Status"
                    wire:model.defer="information.student_status_id">
                    <option value="">Select</option>
                    @foreach ($student_statuses as $student_status)
                        <option value="{{ $student_status->id }}">
                            {{ $student_status->name }}
                        </option>
                    @endforeach
                </x-native-select>
                <div wire:key="first_name"
                    class="sm:col-span-2">
                    <x-input label="First Name"
                        wire:model.defer="information.first_name" />
                </div>
                <div wire:key="middle_name"
                    class="sm:col-span-2">
                    <x-input label="Middle Name"
                        wire:model.defer="information.middle_name"
                        placeholder="Optional" />
                </div>
                <div wire:key="last_name"
                    class="sm:col-span-2">
                    <x-input label="Last Name"
                        wire:model.defer="information.last_name" />
                </div>
                <div wire:key="has_changed_last_name"
                    class="sm:col-span-1">
                    <x-checkbox label="Did your last name change?"
                        wire:model="information.has_changed_last_name" />
                </div>
                <div wire:key="oldlastname"
                    class="sm:col-span-2"
                    x-animate>
                    @if ($information['has_changed_last_name'])
                        <x-input label="Old Last Name"
                            wire:model.defer="information.old_last_name" />
                    @endif
                </div>
                <div wire:key="extension_name"
                    class="sm:col-span-2">
                    <x-input label="Extension Name"
                        wire:model.defer="information.extension_name"
                        placeholder="Optional" />
                </div>
                <div wire:key="sex">
                    <x-native-select label="Sex"
                        wire:model.debounce="information.sex">
                        <option value="">Select</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </x-native-select>
                </div>
                <div wire:key="birth_date">
                    <x-input label="Birth Date"
                        wire:model.defer="information.birth_date"
                        type="date" />
                </div>
                <div wire:key="address">
                    <x-input label="Address"
                        wire:model.defer="information.address" />
                </div>
                <div wire:key="contanct_number">
                    <x-input label="Contact Number"
                        wire:model.defer="information.contanct_number"
                        type="number" />
                </div>
                <div wire:key="campus_id">
                    <x-native-select label="Campus"
                        wire:model="information.campus_id">
                        <option value="">Select</option>
                        @foreach ($campuses as $campus)
                            <option value="{{ $campus->id }}">
                                {{ $campus->name }}
                            </option>
                        @endforeach
                    </x-native-select>
                </div>
                <div wire:key="program_id">
                    <x-native-select label="Program"
                        wire:model="information.program_id">
                        <option value="">Select</option>
                        @foreach ($programs as $program)
                            <option value="{{ $program->id }}">
                                {{ $program->name }}
                            </option>
                        @endforeach
                    </x-native-select>
                </div>
            </div>
        </form>
    </div>
</div>
