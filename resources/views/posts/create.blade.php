<x-app-layout>
    <div class="py-12">
        <div class="container   px-4">
            <div class="bg-white p-6 rounded-lg shadow-md">
                <h1 class="text-2xl font-bold text-pink-600 mb-4">{{ __("Create New Article")}}</h1>

                <form action="{{ route('posts.store') }}" method="POST">
                    @csrf


                    <div class="mb-4">
                        <label class="block text-gray-700 mb-2" for="title">{{ __("Title") }}</label>
                        <input type="text" name="title" id="title" class="w-full border border-gray-300 rounded px-3 py-2" required value="{{ old('title') }}">
                        @error('title')
                            <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                        @enderror
                    </div>


                    <div class="mb-4">
                        <label class="block text-gray-700 mb-2" for="body">{{ __("Content") }}</label>
                        <textarea name="body" id="body" rows="6" class="w-full border border-gray-300 rounded px-3 py-2" required>{{ old('body') }}</textarea>
                        @error('body')
                            <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                        @enderror
                    </div>




                    <div>
                        <button type="submit" class="bg-pink-600 text-white px-4 py-2 rounded hover:bg-pink-700 transition">
                            {{ __("Create Article") }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
