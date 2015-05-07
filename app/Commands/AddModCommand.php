<?php namespace App\Commands;

use App\Commands\Command;

use App\Models\Product;
use App\User;
use Illuminate\Contracts\Bus\SelfHandling;

class AddModCommand extends Command implements SelfHandling {


    public $userId;

    public $productId;
	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */
	public function __construct($userId, $productId)
	{
		$this->userId = $userId;
        $this->productId = $productId;
	}

	/**
	 * Execute the command.
	 *
	 * @return void
	 */
	public function handle()
	{
        $user = User::find($this->userId)->first();
        $product = Product::find($this->productId);
//        dd($user, $product);
        $user->products()->save($product, ['mod' => '1']);
	}

}
