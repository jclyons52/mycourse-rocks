<?php namespace App\Handlers\Commands;

use App\Commands\UnfollowUserCommand;

use App\Libraries\Repositories\UserRepository;
use Illuminate\Queue\InteractsWithQueue;

class UnfollowUserCommandHandler {

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
	 * @param  UnfollowUserCommand  $command
	 * @return void
	 */
	public function handle(UnfollowUserCommand $command)
	{
        $user = $this->userRepo->findById($command->userId);

        $this->userRepo->unfollow($command->userIdToUnfollow, $user);
	}

}
