@props(['title' => null, 'bg' => 'bg-white'])

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport"
        content="width=device-width, initial-scale=1">
    <meta name="csrf-token"
        content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} {{ $title ? '| ' . $title : '' }}</title>

    <!-- Fonts -->
    <link rel="stylesheet"
        href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">
    <link rel="preconnect"
        href="https://fonts.googleapis.com">
    <link rel="preconnect"
        href="https://fonts.gstatic.com"
        crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;500;700&display=swap"
        rel="stylesheet">
    {{-- <meta property="og:url"
        content="http://www.nytimes.com/2015/02/19/arts/international/when-great-minds-dont-think-alike.html" /> --}}
    <meta property="og:type"
        content="School Website" />
    <meta property="og:title"
        content="SKSU OROAD" />
    <meta property="og:description"
        content="Sultan Kudarat State University Online Request Of Academic Documents" />
    <meta property="og:image"
        content="{{ asset('images/sksu-logo.png') }}" />
    <!-- Scripts -->
    @wireUiScripts
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Styles -->
    @livewireStyles

</head>

<body class="{{ $bg }} h-screen font-inter antialiased">
    <div class="h-full">
        {{ $slot }}
    </div>
    <div>
        <x-dialog z-index="z-50"
            blur="md"
            align="center" />
        <x-notifications />
    </div>
    @livewireScripts
</body>

</html>
