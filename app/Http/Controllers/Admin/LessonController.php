<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Lesson;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LessonController extends Controller
{
    public function create($id)
    {
        return view("Admin.lessons.create");
    }

    public function store(Request $request, $id){
        $data = $request->validate([
            "title" => "required",
            "video_path" => ["required", "mimetypes:video/avi,video/mpeg,video/mp4"]
        ]);

        $data["video_path"] = Storage::putFile("lessons", $request->file("video_path"));
        $data["course_id"] = $id;
        Lesson::create($data);
        return redirect()->back()->with("flash.banner", __("Lesson Created"));
    }
    
}
