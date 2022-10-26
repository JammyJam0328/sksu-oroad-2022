@props(['logs', 'show' => true])
<nav x-data="{ show: @js($show) }">
    <ol role="list" class="overflow-hidden">
        @foreach ($logs as $key => $log)
            <li wire:key="{{ $key . $log->id }}" class="relative pb-10"
                @if ($loop->first) x-on:click="show = !show"
                @else
                    x-cloak x-show="show" x-collapse @endif>
                <div class="absolute top-4 left-4 -ml-px mt-0.5 h-full w-0.5 bg-gray-300" aria-hidden="true"></div>
                <a href="#" class="relative flex items-start group" aria-current="step">
                    <span class="flex items-center h-9" aria-hidden="true">
                        @if ($loop->first)
                            <span
                                class="relative z-10 flex items-center justify-center w-8 h-8 rounded-full bg-primary-600 group-hover:bg-primary-800">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-white">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M4.5 15.75l7.5-7.5 7.5 7.5" />
                                </svg>
                            </span>
                        @else
                            <span
                                class="relative z-10 flex items-center justify-center w-8 h-8 border-2 border-white rounded-full bg-primary-600">
                                <span class="h-2.5 w-2.5 rounded-full bg-white"></span>
                            </span>
                        @endif
                    </span>
                    <span class="flex flex-col min-w-0 ml-4">
                        <span class="text-sm font-medium text-primary-600">
                            {{ $log->description }}
                        </span>
                        <span class="text-sm text-gray-500">
                            {{ $log->remarks }}
                        </span>
                    </span>
                </a>
            </li>
        @endforeach
    </ol>
    @if (count($logs) > 1)
        <button x-on:click="show = !show" class="mt-1 text-gray-600 underline focus:text-gray-700"
            x-text="show ? 'Show Less' : 'Show More'"></button>
    @endif
</nav>
