<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Course') }}
        </h2>
    </x-slot>

    <div class="container bg-white p-4 mt-10">
        {{-- {{ route("admin.lesson.store") }} --}}
        <form class="flex flex-col items-center w-full" action="" method="post" enctype="multipart/form-data">
            @csrf
            <div class="w-1/2 mb-4">
                <x-label class="text-xl mb-1">{{ __('Title') }}</x-label>
                <x-input name="title" class="w-full"  value="{{ old('title') }}" />
                <x-input-error for="title"/>

            </div>
            <div class="w-1/2 mb-4">
                <x-label class="text-xl mb-1">{{ __('Video') }}</x-label>
                <x-input name="video_path" type=file  class="w-full mb-2" />
                <x-input-error for="video_path"/>
            </div>

            <div class="w-1/2">
                <button class="btn-primary block w-fit ms-auto">{{ __('Create') }}</button>
            </div>
        </form>
    </div>
</x-app-layout>
