<x-app-layout>
    <div class="py-12">
        <div class="container mx-auto px-4">
            <div class="max-w-3xl mx-auto bg-white p-6 rounded-lg shadow-md">
                <h1 class="text-3xl font-bold text-pink-600 mb-4">{{ $post->title }}</h1>

                <p class="text-gray-600 mb-6">
                    {{ $post->created_at->diffForHumans() }}
                </p>

                <div class="prose max-w-none">
                    {!! nl2br(e($post->body)) !!}
                </div>

                <div class="mt-8">
                    <a href="{{ route('posts.index') }}" class="inline-block text-sm text-pink-600 hover:underline">
                        {{ __('Back to Articles') }}
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
