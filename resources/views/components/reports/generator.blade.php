@props(['headers', 'collection' => [], 'columns' => []])
<div id="print"
    class="mb-10">
    <table id="example"
        class="table-auto mt-2"
        style="width:100%">
        <thead class="font-normal">
            <tr>
                @foreach ($headers as $header)
                    <th class="border text-left px-2 text-sm font-semibold text-gray-500 py-2">
                        {{ $header }}
                    </th>
                @endforeach
            </tr>
        </thead>
        <tbody class="">
            @foreach ($collection as $item)
                <tr>
                    @foreach ($columns as $column)
                        <td class="border px-2 py-2 text-sm text-gray-500">
                            {{ $item->$column }}
                        </td>
                    @endforeach
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
