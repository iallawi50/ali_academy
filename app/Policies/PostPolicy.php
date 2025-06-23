<?php

namespace App\Policies;

use App\Models\Post;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class PostPolicy
{


    /**
     * Determine whether the user can create models.
     */
    public function create(User $user)
    {
        return $user->isAdmin
        ? Response::allow()
        : Response::deny();
    }
}
