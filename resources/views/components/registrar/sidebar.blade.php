<div class="hidden md:fixed md:inset-y-0 md:flex md:w-64 md:flex-col">
    <div class="flex flex-col flex-1 min-h-0 bg-white shadow">
        <div class="relative flex flex-col flex-1 pb-4 overflow-y-auto">
            <div class="flex items-center justify-center flex-shrink-0">
                <div
                    class="flex items-center justify-center w-full px-4 pt-6 space-x-2 border-b-4 border-yellow-500 bg-gradient-to-tr from-green-500 to-green-600 pb-14">
                    <h1 class="text-2xl font-semibold text-center text-white">
                        SKSU - OROAD
                    </h1>
                </div>
            </div>
            <div class="relative flex justify-center">
                <div class="absolute p-1 bg-yellow-500 rounded-full -top-10">
                    <img src="{{ auth()->user()->profile_photo_url }}"
                        alt="..."
                        class="h-16 rounded-full">
                </div>
            </div>
            <div class="mt-5">
                <x-registrar.navigation />
            </div>
        </div>
    </div>
</div>
