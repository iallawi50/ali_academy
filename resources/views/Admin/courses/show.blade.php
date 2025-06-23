<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Course') }}
        </h2>
    </x-slot>

    <div class="container bg-white p-4 mt-10">
        {{-- <form class="flex flex-col items-center w-full" action="{{ route("courses.store") }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="w-1/2 mb-4">
                <x-label class="text-xl mb-1">{{ __('Title') }}</x-label>
                <x-input name="title" class="w-full"  value="{{ old('title') }}" />
                <x-input-error for="title"/>

            </div>
            <div class="w-1/2 mb-4">
                <x-label class="text-xl mb-1">{{ __('Description') }}</x-label>
                <x-input name="description" class="w-full" value="{{ old('description') }}" />
                <x-input-error for="description"/>

            </div>
            <div class="w-1/2 mb-4">
                <x-label class="text-xl mb-1">{{ __('Price') }}</x-label>
                <x-input name="price" class="w-full mb-2" value="{{ old('price') }}" />
                <x-input-error for="price"/>
            </div>
            <div class="w-1/2 mb-4">
                <x-label class="text-xl mb-1">{{ __('Thumbnail') }}</x-label>
                <x-input name="thumbnail" type=file class="w-full mb-2" />
                <x-input-error for="thumbnail"/>
            </div>

            <div class="w-1/2">
                <button class="btn-primary block w-fit ms-auto">{{ __('Create') }}</button>
            </div>
        </form> --}}

        @livewire('course-card', ['id' => $course->id], key($course->id))
    </div>



    <div class="container bg-white p-4 mt-10">
        <div class="flex justify-between">
            <h2 class="text-3xl font-bold">{{ __("Lessons") }} <span class="bg-gray-400 text-xl p-2 rounded-md">{{ $course->lessons->count() }}</span></h2>

            <a href="{{ route("admin.lesson.create",$course->id) }}" class="btn-primary">{{ __("Add Lesson") }}</a>
        </div>
        <hr class="my-4">

        <div class="flex gap-4 flex-col">

            @foreach ($course->lessons as $lesson)
            <a href="{{ route("courses.lesson", [
            "course" => $course->id,
            "lesson" => $lesson->id,
            ]) }}" class="rounded shadow flex items-center justify-between px-4 py-2">
                <h3 class="text-xl">{{ $lesson->title }}</h3>

                <div>
                    <svg xmlns="http://www.w3.org/2000/svg" height="24" width="24"
                        viewBox="0 0 512 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.-->
                        <path fill="#d268cc"
                            d="M464 256A208 208 0 1 0 48 256a208 208 0 1 0 416 0zM0 256a256 256 0 1 1 512 0A256 256 0 1 1 0 256zM188.3 147.1c7.6-4.2 16.8-4.1 24.3 .5l144 88c7.1 4.4 11.5 12.1 11.5 20.5s-4.4 16.1-11.5 20.5l-144 88c-7.4 4.5-16.7 4.7-24.3 .5s-12.3-12.2-12.3-20.9l0-176c0-8.7 4.7-16.7 12.3-20.9z" />
                    </svg>
                </div>

            </a>
            @endforeach

        </div>
    </div>

</x-app-layout>

