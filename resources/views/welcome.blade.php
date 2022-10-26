@extends('layouts.master')

@section('content')
    <div class="grid p-5 space-y-4">
        <x-landing.navbar />
        <x-landing.container>
            <div
                class="absolute bg-yellow-300 rounded-full opacity-50 top-12 left-36 w-52 h-52 mix-blend-multiply filter blur-xl animate-blob">
            </div>
            <div
                class="absolute bg-blue-400 rounded-full opacity-50 -top-12 left-64 w-52 h-52 mix-blend-multiply filter blur-xl animate-blob animation-delay-2000">
            </div>
            <div
                class="absolute bg-green-500 rounded-full opacity-50 top-10 left-56 w-52 h-52 mix-blend-multiply filter blur-xl animate-blob animation-delay-4000">
            </div>

            <div class="flex justify-between space-x-20 ">
                <div class="w-1/2 pt-28 sm:pt-52">
                    <h1 class="text-5xl font-semibold text-green-600 uppercase">
                        Sultan Kudarat
                    </h1>
                    <h1 class="text-5xl font-semibold text-green-600 uppercase">
                        State University
                    </h1>
                    <p class="mt-3 text-xl text-gray-700">
                        Online Request of Academic Records
                    </p>
                    <div class="mt-5">
                        <a href="/dashboard"
                            class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-green-600 rounded-lg hover:bg-green-700 focus:outline-none">
                            Get Started</a>
                    </div>
                </div>
                <div>
                    <x-landing.undraw1 />
                </div>
                <div
                    class="absolute bg-green-500 rounded-full opacity-50 -bottom-40 -right-56 w-52 h-52 mix-blend-multiply filter blur-xl animate-blob animation-delay-4000">
                </div>
                <div
                    class="absolute bg-yellow-500 rounded-full opacity-50 -bottom-56 -left-56 w-52 h-52 mix-blend-multiply filter blur-xl animate-blob animation-delay-4000">
                </div>
            </div>
        </x-landing.container>
    </div>
@endsection
