<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::paginate(3);
        return view("posts.index", compact("posts"));
    }

    public function show(Post $post)
    {
        return view("posts.show", compact("post"));
    }
    public function create()
    {
        Gate::authorize("admin");
        return view("posts.create");
    }
    public function store(Request $request)
    {
        Gate::authorize('admin');
        $data = $request->validate([
            "title" => "required",
            "body" => "required",
            "user_id" => "nullable",
        ]);

        $data["user_id"] = auth()->id();

        Post::create($data);
        return redirect()->route("posts.index")->with("flash.banner", __("Article Created"));
    }
    public function destroy(Post $post)
    {
        Gate::authorize('admin');
        $post->delete();
        return redirect()->back()->with("flash.banner", __("Article Deleted"));
    }

    public function edit(Post $post)
    {
        Gate::authorize('admin');
        return view("posts.edit", compact("post"));
    }

    public function update(Request $request, Post $post)
    {
        Gate::authorize('admin');
        $data = $request->validate([
            "title" => "required",
            "body" => "required",
        ]);
        $post->update($data);
        return redirect()->route("posts.index")->with("flash.banner", __("Article Updated"));
    }
}
