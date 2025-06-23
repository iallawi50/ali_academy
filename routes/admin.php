<?php

use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\LessonController;
use App\Http\Middleware\checkAdminMiddleware;
use App\Models\Invoice;
use Illuminate\Support\Facades\Route;

Route::name("admin.")->middleware(checkAdminMiddleware::class)->group(function () {
    Route::resource('dashboard/courses', CourseController::class);

    Route::get('/invoices', function () {
        return view("invoices.index")->with([
            "invoices" => Invoice::all()
        ]);
    })->name("invoices");
    Route::name("lesson.")->prefix("courses/{id}/lessons")->controller(LessonController::class)->group(function () {
        Route::get("/create", "create")->name("create");
        Route::post("/create", "store")->name("store");
    });
});
