@php
    $navigations = [
        [
            'path' => route('registrar.dashboard'),
            'label' => 'Dashboard',
            'icon' => 'icons.dashboard',
            'active' => request()->is('registrar/dashboard*'),
        ],
        [
            'path' => route('registrar.requests'),
            'label' => 'Requests',
            'icon' => 'icons.requests',
            'active' => request()->is('registrar/requests*'),
        ],
        [
            'path' => route('registrar.reports'),
            'label' => 'Reports',
            'icon' => 'icons.reports',
            'active' => request()->is('registrar/reports*'),
        ],
    ];
    
    $for_access_campus_navigations = [
        [
            'path' => '#',
            'label' => 'Documents',
            'icon' => 'icons.documents',
            'active' => false,
        ],
        [
            'path' => '#',
            'label' => 'Campus',
            'icon' => 'icons.campuses',
            'active' => false,
        ],
    ];
@endphp

<nav class="flex-1 px-3 mt-5 space-y-2 bg-primary-700">
    @foreach ($navigations as $navigation)
        <x-registrar.nav-link :active="$navigation['active']"
            :to="$navigation['path']"
            :label="$navigation['label']"
            :icon="$navigation['icon']" />
    @endforeach
    @if (auth()->user()->isAdmin())
        @foreach ($for_access_campus_navigations as $navigation)
            <x-registrar.nav-link :active="$navigation['active']"
                :to="$navigation['path']"
                :label="$navigation['label']"
                :icon="$navigation['icon']" />
        @endforeach
    @endif
</nav>
