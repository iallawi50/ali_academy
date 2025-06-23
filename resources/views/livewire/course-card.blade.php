<div class="flex gap-4 flex-col  md:flex-row">
    <div class=" overflow-hidden basis-2/6 ">
        @if($course->isPublish)
        <span class="absolute ms-2 mt-2 bg-green-600 text-white font-bold p-2 rounded-md">{{ __("Published") }}</span>

        @else
        <span class="absolute ms-2 mt-2 bg-gray-600 text-white font-bold p-2 rounded-md">{{ __("Draft") }}</span>
        @endif
        <img class="w-full" src="{{ asset(  "storage/".$course->thumbnail ) }}" alt="">
    </div>
    <div class="flex flex-col basis-4/6">
        <h1 class="text-3xl">{{ $course->title }}</h1>
        <p>
            {{ $course->description }}
        </p>
        <hr>
        <p class="text-xl">
            {{ __("السعر") }} : {{ $course->price }}

        </p>


        <div class="flex gap-3 self-end mt-auto">
            <button wire:click="publish" class="btn-primary w-fit {{ $course->isPublish ? ' bg-gray-500  hover:bg-gray-600 active:bg-gray-700 focus:bg-gray-700' : ' bg-green-500  hover:bg-green-600 active:bg-green-700 focus:bg-green-700' }}">{{ $course->isPublish ? __("Hide") : __("Publish") }}</button>
            <a href=""  class="btn-primary w-fit bg-orange-500 hover:bg-orange-600 active:bg-orange-700 focus:bg-orange-700"> {{__("Edit") }} </a>
            <x-danger-button wire:click="delete" wire:confirm='{{ __("Are You Sure you want to delete this course") }}' class="w-fit"> {{__("Delete") }} </x-danger-button>
        </div>
    </div>

</div>
