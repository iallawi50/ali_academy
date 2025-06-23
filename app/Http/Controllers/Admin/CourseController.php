<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Lesson;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $courses = Course::all();
        return view("Admin.courses.index", compact("courses"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("Admin.courses.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate(
            [
                "title" => "required",
                "description" => "required",
                "thumbnail" => ["required", 'mimes:jpg,jpeg,png'],
                "price" => ["required", "numeric"]
            ],
            [
                "title" => ["required" => "حقل العنوان مطلوب"]
            ]
        );





        $data["thumbnail"] = Storage::putFile('thumbnails', $request->file('thumbnail'));





        $course = Course::create($data);
        return redirect()->route("admin.courses.show", $course->id);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $course = Course::find($id);
        return view("Admin.courses.show", compact("course"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Course $course)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Course $course)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $course)
    {
        //
    }
}
