<?php

namespace App\Policies;

use App\Models\User;
use App\Models\UserPost;
use Illuminate\Auth\Access\Response;

use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\UserPost  $userPost
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, UserPost $userPost)
    {
        return $user->id === $userPost->user_id;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\UserPost  $userPost
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, UserPost $userPost)
    {
        return $user->id === $userPost->user_id;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\UserPost  $userPost
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, UserPost $userPost)
    {
        return $user->id === $userPost->user_id
        ? Response::allow()
        : Response::deny('You do not own this post.');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\UserPost  $userPost
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, UserPost $userPost)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\UserPost  $userPost
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, UserPost $userPost)
    {
        //
    }
}