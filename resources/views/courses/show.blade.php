<x-app-layout>
    <div class="container bg-white mt-14 p-4">
        <div class="flex gap-4 flex-col  md:flex-row">
            <div class=" overflow-hidden basis-2/6 ">
                <img class="w-full" src="{{ asset('storage/' . $course->thumbnail) }}" alt="">
            </div>
            <div class="flex flex-col basis-4/6">
                <h1 class="text-3xl">{{ $course->title }}</h1>
                <p>
                    {{ $course->description }}
                </p>
                <hr>
                <p class="text-xl">
                    {{ __('السعر') }} : {{ $course->price }}

                </p>


                <div class="flex gap-3 self-end mt-auto mb-3">
                    @cannot('has-course', $course)
                        </button>
                        <form action="{{ route('checkout', $course->id) }}" method="POST">
                            @csrf
                            <button type="submit" id="checkout-button"
                                class="btn-primary w-fit    bg-green-500  hover:bg-green-600 active:bg-green-700 focus:bg-green-700 text-xl">{{ __('Buy') }}</button>
                        </form>
                    @endcannot

                </div>

            </div>

        </div>
    </div>

    <div class="container bg-white p-4 mt-10">
        <div class="flex justify-between">
            <h2 class="text-3xl font-bold">{{ __('Lessons') }} <span
                    class="bg-gray-400 text-xl p-2 rounded-md">{{ $course->lessons->count() }}</span></h2>
        </div>
        <hr class="my-4">

        <div class="flex gap-4 flex-col">

            @foreach ($course->lessons as $lesson)
                <a href="{{ route('courses.lesson', [
                    'course' => $course->id,
                    'lesson' => $lesson->id,
                ]) }}"
                    class="rounded shadow flex justify-between px-4 py-2">
                    <h3 class="text-xl">{{ $lesson->title }}</h3>

                    @can('has-course', $course)
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" height="24" width="24"
                                viewBox="0 0 512 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.-->
                                <path fill="#d268cc"
                                    d="M464 256A208 208 0 1 0 48 256a208 208 0 1 0 416 0zM0 256a256 256 0 1 1 512 0A256 256 0 1 1 0 256zM188.3 147.1c7.6-4.2 16.8-4.1 24.3 .5l144 88c7.1 4.4 11.5 12.1 11.5 20.5s-4.4 16.1-11.5 20.5l-144 88c-7.4 4.5-16.7 4.7-24.3 .5s-12.3-12.2-12.3-20.9l0-176c0-8.7 4.7-16.7 12.3-20.9z" />
                            </svg>
                        </div>
                    @else
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" height="20" width="17.5"
                                viewBox="0 0 448 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.-->
                                <path
                                    d="M144 144l0 48 160 0 0-48c0-44.2-35.8-80-80-80s-80 35.8-80 80zM80 192l0-48C80 64.5 144.5 0 224 0s144 64.5 144 144l0 48 16 0c35.3 0 64 28.7 64 64l0 192c0 35.3-28.7 64-64 64L64 512c-35.3 0-64-28.7-64-64L0 256c0-35.3 28.7-64 64-64l16 0z" />
                            </svg>
                        </div>
                    @endcan



                </a>
            @endforeach

        </div>
    </div>



</x-app-layout>
