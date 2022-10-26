@props([
    'menu' => null,
    'data' => [],
    'columns' => [],
    'headers' => [],
])
<div>
    @if ($menu)
        <div
            class="px-4 py-2.5 bg-white flex justify-between w-full  shadow rounded-md sm:flex sm:items-center ring-1 ring-black ring-opacity-5 md:rounded-lg">
            {{ $menu }}
        </div>
    @endif
    <div class="flex flex-col mt-5">
        <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-300">
                        <thead class="bg-primary-600">
                            <tr>
                                @foreach ($headers as $header)
                                    <th scope="col"
                                        class="py-3 pl-4 pr-3 text-xs font-medium tracking-wide text-left text-white uppercase sm:pl-6">
                                        {{ $header }}</th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            {{ $slot }}
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="mt-2">
        {{ $pagination ?? '' }}
    </div>
</div>
