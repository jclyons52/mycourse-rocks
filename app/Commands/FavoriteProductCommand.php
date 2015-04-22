<?php namespace App\Commands;

use App\Commands\Command;

class FavoriteProductCommand extends Command {

    /**
     * @var
     */
    public $userId;

    /**
     * @var
     */
    public $productIdToFavorite;

    /**
     * @param $userId
     * @param $userIdToFollow
     */
    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct($userId, $productIdToFavorite)
    {
        $this->userId = $userId;
        $this->userIdToFollow = $productIdToFavorite;
    }

}
