<?php

namespace App\Providers;

use App\Models\Course;
use App\Models\Invoice;
use App\Models\User;
use App\Policies\PostPolicy;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Gate::define('admin', [PostPolicy::class, 'create']);

        Gate::define("has-course", function(User $user, Course $course) {
            return Invoice::where("user_id", $user->id)->where("course_id", $course->id)->where("payment_status", "paid")->exists() || $user?->isAdmin;
        });
    }
}
