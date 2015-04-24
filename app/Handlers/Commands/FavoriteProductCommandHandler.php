<?php namespace App\Handlers\Commands;

use App\Commands\FavoriteProductCommand;

use App\Libraries\Repositories\ProductRepository;
use App\Libraries\Repositories\UserRepository;
use Illuminate\Queue\InteractsWithQueue;

class FavoriteProductCommandHandler {

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
	 * @param  FavoriteProductCommand  $command
	 * @return void
	 */
	public function handle(FavoriteProductCommand $command)
	{
        $user = $this->userRepo->findById($command->userId);

        $this->productRepo->favorite($command->productIdToFavorite, $user);

        return $user;
	}

}
