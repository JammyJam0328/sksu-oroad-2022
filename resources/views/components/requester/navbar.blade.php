<nav class="bg-white">
    <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-16">
            <div class="flex items-center space-x-2">
                <div class="flex items-center flex-shrink-0">
                    <img class="block w-auto h-8"
                        src="{{ asset('images/sksu-logo.png') }}"
                        alt="Your Company">
                </div>
                <div class=" sm:ml-6 sm:flex sm:space-x-8">
                    <h1 class="block text-xl font-semibold text-green-600 sm:hidden">
                        SKSU - OROAD
                    </h1>
                    <h1 class="hidden text-xl font-semibold text-green-600  sm:block">
                        SULTAN KUDARAT STATE UNIVERSITY - OROAD
                    </h1>
                </div>
            </div>
            <div class="sm:ml-6 sm:flex sm:items-center">
                <div class="relative ml-3">
                    <x-shared.profile-dropdown />
                </div>
            </div>
        </div>
    </div>
</nav>
