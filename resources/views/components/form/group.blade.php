@props(['label' => '', 'for' => ''])
<div {{ $attributes }}>
    <x-form.label for="{{ $for }}">
        {{ $label }}
    </x-form.label>
    <div class="mt-1">
        {{ $slot }}
    </div>
    @error($for)
        <span class="text-sm text-red-500">
            {{ $message }}
        </span>
    @enderror
</div>
