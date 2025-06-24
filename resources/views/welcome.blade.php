<x-app-layout>
    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot> --}}

    @isset($session)
@dd($session)
    @endisset
    <div class="py-12">
        <div class="container">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg flex flex-col md:flex-row justify-between items-center px-6">
                <div class="text-3xl">
                    <h1 class="mb-4">{{__("All the skills you need in one place")}}</h1>
                </div>
                <img src="{{ asset("imgs/landing.jpg") }}" alt="landing" class="w-96 {{ App::isLocale("en") ? 'scale-x-[-1]' : '' }}">
            </div>
            <x-courses :guest="true" :courses="$courses" />
        </div>


    </div>
</x-app-layout>
