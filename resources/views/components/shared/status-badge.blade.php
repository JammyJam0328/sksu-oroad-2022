@props(['status_id', 'size' => 'text-xs', 'message' => ''])

<div wire:key="{{ $status_id }}" @class([
    '{{ $status_id }} inline-flex items-center rounded-full px-2.5 py-0.5 border  font-medium' .
    $size,
    'bg-yellow-200 text-yellow-700 border-yellow-700' => $status_id == 1,
    'bg-blue-200 text-blue-700 border-blue-700' => $status_id == 2,
    'bg-red-200 text-red-700 border-red-700' => $status_id == 3,
    'bg-cyan-200 text-cyan-700 border-cyan-700' => $status_id == 4,
    'bg-green-200 text-green-700 border-green-700' => $status_id == 5,
    'bg-red-200 text-red-700 border-red-700' => $status_id == 6,
    'bg-gray-200 text-gray-700 border-gray-700' => $status_id == 7,
    'bg-black text-white border-gray-700' => $status_id == 8,
])>
    {{ $message }}
    {{ $slot }}
</div>
