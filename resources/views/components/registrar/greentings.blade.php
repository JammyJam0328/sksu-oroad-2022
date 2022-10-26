@php
    // detect if morning,noon, afternoon, or evening
    $time = date('H');
    $greeting = 'Good ';
    if ($time < 12) {
        $greeting .= 'Morning';
    } elseif ($time < 18) {
        $greeting .= 'Afternoon';
    } else {
        $greeting .= 'Evening';
    }
@endphp

<div class="grid">
    <h1 class="text-gray-700 ">
        {{ $greeting }}, {{ auth()->user()->name }} !
    </h1>
    <h1 class="text-xs text-gray-500">
        Welcome to your dashboard.
    </h1>
</div>
