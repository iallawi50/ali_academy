<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Courses Management') }}
        </h2>
    </x-slot>

    <div class="container mt-10 text-end">
        <a href="{{ route("admin.courses.create") }}" class="btn-primary">{{ __("Create Course") }}</a>
    </div>
    <x-courses :courses="$courses" />




</x-app-layout>
