<x-app-layout>
    <div class="py-12">
        <div class="container mx-auto px-4">
            <div class="flex items-center justify-between">
                <h1 class="text-3xl font-bold mb-6">{{ __("Articles") }}</h1>
                <a href="{{ route("posts.create") }}" class="btn btn-primary">{{ __("Create New Article") }}</a>
            </div>

            <div class="grid grid-cols-1 gap-6">
                @forelse($posts as $post)
                    <div class="bg-white shadow-md rounded-lg p-4">
                        <h2 class="text-xl font-semibold mb-2">{{ $post->title }}</h2>
                        <p class="text-gray-600">{{ Str::limit($post->body, 100) }}</p>
                        <div class="flex justify-between items-center">
                            <a href="{{ route("posts.show", $post->id) }}" class="btn btn-primary">{{ __("Read More") }}</a>

                            @can('admin')
                            <div class="flex gap-3">
                                <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-warning block">{{ __("Edit") }}</a>

                                <!-- Delete button, using a form to make a POST request for deletion -->
                                <form action="{{ route('posts.destroy', $post->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" onclick='return confirm("{{ __("Are You Sure you want to delete this article") }}")' class="btn btn-danger">{{ __("Delete") }}</button>
                                </form>
                            </div>
                            @endcan
                        </div>
                    </div>
                @empty
                    <p>{{ __("No articles found.") }}</p>
                @endforelse
            </div>

            <div class="mt-6">
                {{ $posts->links() }}
            </div>
        </div>
    </div>
</x-app-layout>
