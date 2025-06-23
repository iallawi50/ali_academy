<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Lesson;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class CommentController extends Controller
{
    public function store(Request $request, Lesson $lesson)
    {
        Gate::authorize("has-course", $lesson->course);
        $data = $request->validate([
            "body" => "required"
        ]);

        $data["user_id"] = auth()->id();
        $data["lesson_id"] = $lesson->id;
        Comment::create($data);

        return redirect()->back();
    }
}
