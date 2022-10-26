@props(['header' => null, 'footer' => null])
<div class=" px-2 bg-white grid  w-full  shadow rounded-md ring-1 ring-black ring-opacity-5 md:rounded-lg">
    @if ($header)
        <div class="border-b px-2.5 py-2">
            {{ $header }}
        </div>
    @endif
    <div class="px-2 py-2.5">
        {{ $slot }}
    </div>
    @if ($footer)
        <div class="border-t px-2.5 py-2">
            {{ $footer }}
        </div>
    @endif
</div>
