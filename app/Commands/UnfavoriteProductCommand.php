<?php namespace App\Commands;

use App\Commands\Command;

class UnfavoriteProductCommand extends Command {

    /**
     * @var
     */
    public $userId;

    /**
     * @var
     */
    public $productIdToUnfavorite;

    /**
     * @param $userId
     * @param $userIdToFollow
     */
    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct($userId, $productIdToUnfavorite)
    {
        $this->userId = $userId;
        $this->userIdToUnfollow = $productIdToUnfavorite;
    }

}
