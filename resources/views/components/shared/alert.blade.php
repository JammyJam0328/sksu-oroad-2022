@props(['message', 'type' => 'success'])

<div @class([
    'rounded-md p-4',
    'bg-blue-50 border border-blue-400' => $type === 'info',
    'bg-green-50 border border-green-400' => $type === 'success',
    'bg-yellow-50 border border-yellow-400' => $type === 'warning',
    'bg-red-50 border border-red-400' => $type === 'danger',
])>
    <div class="flex">
        <div class="flex-shrink-0">
            <svg @class([
                'h-5 w-5',
                'text-blue-400' => $type === 'info',
                'text-green-400' => $type === 'success',
                'text-yellow-400' => $type === 'warning',
                'text-red-400' => $type === 'danger',
            ]) xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                aria-hidden="true">
                <path fill-rule="evenodd"
                    d="M19 10.5a8.5 8.5 0 11-17 0 8.5 8.5 0 0117 0zM8.25 9.75A.75.75 0 019 9h.253a1.75 1.75 0 011.709 2.13l-.46 2.066a.25.25 0 00.245.304H11a.75.75 0 010 1.5h-.253a1.75 1.75 0 01-1.709-2.13l.46-2.066a.25.25 0 00-.245-.304H9a.75.75 0 01-.75-.75zM10 7a1 1 0 100-2 1 1 0 000 2z"
                    clip-rule="evenodd" />
            </svg>
        </div>
        <div @class([
            'ml-3 flex-1 md:flex md:justify-between',
            'text-blue-700' => $type === 'info',
            'text-green-700' => $type === 'success',
            'text-yellow-700' => $type === 'warning',
            'text-red-700' => $type === 'danger',
        ]) class="">
            <p class="text-sm">
                {{ $message }}
            </p>
            <p class="mt-3 text-sm md:mt-0 md:ml-6">
                {{ $slot }}
            </p>
        </div>
    </div>
</div>
