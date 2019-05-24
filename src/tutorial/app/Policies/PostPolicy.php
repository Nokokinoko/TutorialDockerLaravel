<?php

namespace App\Policies;

use App\User;
use App\Post;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }
    
    /**
     * 管理者にのみ実行を許可(falseを返すと全て禁止してしまうためnullを返す)
     *
     * @param $user
     * @param $ability
     * @return mixed
     */
    public function before($user, $ability)
    {
        return $user->isAdmin() ? true : null;
    }
    
    /**
     * Allow edit, delete
     *
     * @param \App\User $user login user
     * @param \App\Post $post target post
     * @return mixed
     */
    public function edit(User $user, Post $post)
    {
        return ( $user->id == $post->user_id );
    }
}
