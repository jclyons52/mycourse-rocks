<?php namespace App\Libraries\Repositories;

use App\User;


class ProductRepository {


    /**
     * Follow a Larabook user.
     *
     * @param $userIdToFollow
     * @param User $user
     * @return mixed
     */
    public function favorite($productIdToFavorite, User $user)
    {
        return $user->products()->attach($productIdToFavorite);
    }

    /**
     * Unfollow a Larabook user.
     *
     * @param $userIdToUnfollow
     * @param User $user
     * @return mixed
     */
    public function unfollow($productIdToUnfavorite, User $user)
    {
        return $user->followedUsers()->detach($productIdToUnfavorite);
    }

}