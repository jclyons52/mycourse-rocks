<?php namespace App\Commands;

use App\Commands\Command;

class FollowUserCommand extends Command {

    /**
     * @var
     */
    public $userId;

    /**
     * @var
     */
    public $userIdToFollow;

    /**
     * @param $userId
     * @param $userIdToFollow
     */
	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */
	public function __construct($userId, $userIdToFollow)
    {
        $this->userId = $userId;
        $this->userIdToFollow = $userIdToFollow;
    }

}
