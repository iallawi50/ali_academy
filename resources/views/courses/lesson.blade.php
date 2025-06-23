<x-app-layout>
    <div class="container bg-white mt-14 p-6">
        <a href="{{ route('courses.show', $lesson->course->id) }}" class="text-xl block mb-2 text-sky-500">
            {{ $lesson->course->title }}
        </a>
        <h1 class="text-3xl font-bold mb-2">{{ $lesson->title }}</h1>




        @if ($lesson->video_path)
            <div class="mt-8">
                <video controls class="w-full rounded shadow">
                    <source src="{{ asset("storage/$lesson->video_path") }}" type="video/mp4">
                    {{ __('Your browser does not support the video tag.') }}
                </video>
            </div>
        @endif

        <div class="container bg-white mt-10 p-6">
            <h2 class="text-2xl font-bold mb-4">{{ __('Comments') }}</h2>

            {{-- نموذج إضافة تعليق --}}




            {{-- عرض التعليقات --}}
            @forelse($lesson->comments as $comment)
                <div class="border-t pt-4 mt-4">
                    <p class="text-sm text-gray-600">
                        {{ $comment->user->name }} • {{ $comment->created_at->diffForHumans() }}
                    </p>
                    <p class="mt-1">{{ $comment->body }}</p>
                </div>
            @empty
                <p class="text-gray-500">{{ __('There are no comments') }}</p>
            @endforelse


            <form action="{{ route('lesson.comment', $lesson->id) }}" method="POST" class="mt-6">
                @csrf
                <textarea name="body" rows="3" class="w-full border rounded p-2" required></textarea>
                <button type="submit" class="mt-2 btn-primary">
                    {{ __('Add Comment') }}
                </button>
            </form>
        </div>

    </div>
</x-app-layout>
