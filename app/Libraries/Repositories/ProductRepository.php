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
        return $user->products()->attach($productIdToFavorite, ['favorite' => '1']);
    }

    /**
     * Unfollow a Larabook user.
     *
     * @param $userIdToUnfollow
     * @param User $user
     * @return mixed
     */
    public function unFavorite($productIdToUnfavorite, User $user)
    {
        return $user->products()->detach($productIdToUnfavorite);
    }

}