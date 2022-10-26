<nav class="bg-white ">
    <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="flex items-center h-16 sm:justify-between">
            <div class="flex">
                <div class="flex items-center justify-between flex-shrink-0 ">
                    <div>
                        <img src="{{ asset('images/sksu-logo.png') }}"
                            class="w-auto h-8"
                            alt="">
                    </div>
                </div>
                <div class="hidden sm:ml-6 sm:flex sm:space-x-8">
                    <a href="#"
                        class="inline-flex items-center px-1 pt-1 text-sm font-medium text-gray-500 hover:border-gray-300 hover:text-gray-700">Help
                        Desk</a>
                    <a href="#"
                        class="inline-flex items-center px-1 pt-1 text-sm font-medium text-gray-500 hover:border-gray-300 hover:text-gray-700">Official
                        Website</a>
                    <a href="#"
                        class="inline-flex items-center px-1 pt-1 text-sm font-medium text-gray-500 hover:border-gray-300 hover:text-gray-700">About</a>
                </div>
            </div>
            <div class="sm:ml-6 sm:flex sm:items-center">
                @auth
                    <a href="/dashboard"
                        class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-green-600 rounded-lg hover:bg-green-700 focus:outline-none">
                        Dashboard</a>
                @endauth
                @guest
                    <div class="flex items-center space-x-8">
                        <a href="{{ route('login') }}"
                            class="text-sm text-gray-700">Log-in</a>

                        <a href="{{ route('register') }}"
                            class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-green-600 rounded-lg hover:bg-green-700 focus:outline-none">
                            Register
                        </a>
                    </div>
                @endguest
            </div>
        </div>
    </div>
</nav>
