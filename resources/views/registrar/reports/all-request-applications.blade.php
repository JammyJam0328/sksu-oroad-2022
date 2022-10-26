<table id="report1"
    class="table-auto mt-2"
    style="width:100%">
    <thead class="font-normal">
        <tr>
            <th class="border border-black text-left px-2 text-sm font-semibold text-gray-800 py-2">
                Code
            </th>
            <th class="border border-black text-left px-2 text-sm font-semibold text-gray-800 py-2">
                Full Name
            </th>
            <th class="border border-black text-left px-2 text-sm font-semibold text-gray-800 py-2">
                Document
            </th>
            <th class="border border-black text-left px-2 text-sm font-semibold text-gray-800 py-2">
                Status
            </th>
        </tr>
    </thead>
    <tbody class="">
        @foreach ($request_applications as $request_application)
            <tr>
                <td class="border px-3 py-1  border-black"> {{ $request_application->code }}</td>
                <td class="border px-3 py-1  border-black">
                    {{ $request_application->first_name }} {{ $request_application->middle_name }}
                    {{ $request_application->last_name }} {{ $request_application->extension_name }}
                </td>
                <td class="border px-3 py-1  border-black"> {{ $request_application->request_document->document->name }}
                </td>
                <td class="border px-3 py-1  border-black"> {{ $request_application->status->name }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
