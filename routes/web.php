<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::get('/', [CourseController::class, "index"])->name("homepage");

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
Route::get("lang/{lang}", [LanguageController::class, "languageSwitch"])->name("locale");
Route::get("courses/show/{course}", [CourseController::class, "show"])->name("courses.show");
Route::get("courses/show/{course}/lesson/{lesson}", [CourseController::class, "lesson"])->name("courses.lesson");
Route::get("my-courses", [CourseController::class, "enrolled"])->name("courses.enrolled");
Route::post("lesson/{lesson}/comment", [CommentController::class, "store"])->name("lesson.comment");
Route::resource('posts', PostController::class);
require_once __DIR__ . "/admin.php";
require_once __DIR__ . "/stripe.php";


