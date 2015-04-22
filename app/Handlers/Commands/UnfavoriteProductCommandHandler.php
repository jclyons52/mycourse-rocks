<?php namespace App\Handlers\Commands;

use App\Commands\UnfavoriteProductCommand;

use App\Libraries\Repositories\ProductRepository;
use App\Libraries\Repositories\UserRepository;
use Illuminate\Queue\InteractsWithQueue;

class UnfavoriteProductCommandHandler {

    /**
     * @var ProductRepository
     */
    protected $productRepo;
    /**
     * @var UserRepository
     */
    protected $userRepo;
    /**
     * Create the command handler.
     *
     * @return void
     */
    public function __construct(ProductRepository $productRepo, UserRepository $userRepo)
    {
        $this->productRepo = $productRepo;

        $this->userRepo = $userRepo;
    }

	/**
	 * Handle the command.
	 *
	 * @param  UnfavoriteProductCommand  $command
	 * @return void
	 */
	public function handle(UnfavoriteProductCommand $command)
	{
        $user = $this->userRepo->findById($command->userId);

        $this->productRepo->unFavorite($command->userIdToUnfollow, $user);

        return $user;
	}

}
