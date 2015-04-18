<?php namespace App\Commands;

use App\Commands\Command;
use App\Fileentry;
use Illuminate\Contracts\Bus\SelfHandling;

class GenerateThumbnailCommand extends Command implements SelfHandling {

    public $entity;
    public $file;
	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */
	public function __construct(Fileentry $entity)
	{
		$this->entity = $entity;
        $file = Storage::disk('local')->get($entry->filename);
	}

	/**
	 * Execute the command.
	 *
	 * @return void
	 */
	public function handle(GenerateThumbnailCommand $command)
	{
		dd($command);
        $im = new imagick($file.'[0]');
        $im->setImageFormat('jpg');

	}

}
