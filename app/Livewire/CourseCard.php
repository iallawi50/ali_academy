<?php

namespace App\Livewire;

use App\Models\Course;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class CourseCard extends Component
{
    public $id;

    private function course()
    {
        return Course::find($this->id);
    }
    public function render()
    {
        $course = $this->course();

        return view('livewire.course-card', compact("course"));
    }

    public function publish()
    {
        $course = $this->course();

        $course->update([
            "isPublish" => !$course->isPublish
        ]);
    }

    public function delete()
    {
        foreach ($this->course()->lessons as $lesson) {
            Storage::delete($lesson->video_path);
        }
        Storage::delete($this->course()->thumbnail);
        $this->course()->delete();
        redirect()->route("admin.courses.index");
    }
}
