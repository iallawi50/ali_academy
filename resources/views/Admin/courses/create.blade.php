<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Course') }}
        </h2>
    </x-slot>

    <div class="container bg-white p-4 mt-10">
        <form class="flex flex-col items-center w-full" action="{{ route("admin.courses.store") }}" method="post" enctype="multipart/form-data">
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
        </form>
    </div>
</x-app-layout>
