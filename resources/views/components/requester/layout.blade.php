<div class="grid gap-10">
    <x-requester.navbar />
    <x-requester.mobile-nav />
    <div class="w-full px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="max-w-4xl mx-auto">
            {{ $slot }}
        </div>
    </div>
</div>
