<div class="py-12">
    @forelse ($courses as $course)
        @if ($loop->first)
            <div class="container bg-white rounded-md py-4 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-5">
        @endif

        <a href="{{ isset($guest) ? route("courses.show", $course->id) : route("admin.courses.show", $course->id) }}" class="flex flex-col border-2 shadow-lg rounded-md">
            <div class="w-full h-60 relative overflow-hidden rounded-md mb-3">
                @if(!auth()->user()?->isAdmin)
                @can('has-course', $course)
                <span class="text-xs absolute right-1 top-1 text-green-500 font-bold rounded bg-green-50 px-3 py-1 w-fit mb-0">{{ __("Enrolled") }}</span>
                @endcan
                @endif
                <img src="{{ asset("storage/$course->thumbnail") }}" alt="">
            </div>

            {{-- Content --}}
            <div class="px-3 flex flex-col gap-4">
                <div>

                    <h1 class="text-md text-[--main] font-bold">{{$course->title }}</h1>

                </div>
                <p>
                    {{ Str::limit($course->description, 100, '...') }}
                </p>


                <div class="flex justify-between items-center mb-1">
                    <button class="btn-primary w-fit text-sm" href="">عرض</button>
                    <span class="border-2 border-[--main] px-3 py-2">{{ $course->price }} ريال</span>
                </div>
            </div>


        </a>



        @if ($loop->last)
</div>
@endif
@empty
<div class="container bg-white flex flex-col items-center py-10">
<img src="{{ asset("imgs/courses.svg") }}" class="w-96">
<h1 class="text-[--main] text-5xl">{{ __("Sorry, There are no courses") }}</h1>
</div>
@endforelse
</div>
