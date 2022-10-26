@aware(['headers' => ''])

<tr wire:key="empty" class="bg-white">
    <td colspan="{{ count($headers) }}"
        {{ $attributes->merge(['class' => 'py-4 text-center pl-4 pr-3 text-sm font-medium text-gray-900 whitespace-nowrap sm:pl-6']) }}>
        No records found.
    </td>
</tr>
