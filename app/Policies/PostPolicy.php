<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Post;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;
class PostPolicy
{

    use HandlesAuthorization;
    public function __construct()
    {
        //
    }

    public function view(User $user, Post $post)
    {
        return $user->id == $post->user_id;
    }

    public function create(User $user)
    {
        // return true;
        return Response::deny("You are....");
    }
}
