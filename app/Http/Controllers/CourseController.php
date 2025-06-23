<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Lesson;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $courses = Course::where("isPublish", true)->latest()->get();
        return view("welcome", compact("courses"));
    }


    /**
     * Display the specified resource.
     */
    public function show(Course $course)
    {
        return $course->isPublish
        ? view("courses.show", compact("course"))
        : abort(404);
    }

    public function lesson(Course $course, Lesson $lesson)
    {
        if(Gate::allows("has-course", $course)) {
            return view("courses.lesson", compact("lesson"));
        }  else {
            return redirect()->route("courses.show", $course->id);
        }
    }


    public function enrolled()
    {
        $courses = auth()->user()->invoices;
        return view("welcome", compact("courses"));
    }


}
