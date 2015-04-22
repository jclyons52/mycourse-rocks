<?php namespace App\Handlers\Commands;

use App\Commands\FollowUserCommand;

use Illuminate\Queue\InteractsWithQueue;
use App\Libraries\Repositories\UserRepository;

class FollowUserCommandHandler {

    /**
     * @var UserRepository
     */
    protected $userRepo;
	/**
	 * Create the command handler.
	 *
	 * @return void
	 */
	public function __construct(UserRepository $userRepo)
    {
        $this->userRepo = $userRepo;
    }

	/**
	 * Handle the command.
	 *
	 * @param  FollowUserCommand  $command
	 * @return void
	 */
	public function handle(FollowUserCommand $command)
	{
        $user = $this->userRepo->findById($command->userId);

        $this->userRepo->follow($command->userIdToFollow, $user);

        return $user;
	}

}
