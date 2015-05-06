<?php namespace App\Handlers\Commands;


use App\Commands\StoreUserLessonResultCommand;
use App\Models\Lesson;
use App\User;
use Illuminate\Queue\InteractsWithQueue;

class StoreUserLessonResultCommandHandler {

	/**
	 * Create the command handler.
	 *
	 * @return void
	 */
	public function __construct()
	{
		//
	}

	/**
	 * Handle the command.
	 *
	 * @param  StoreUserLessonResultCommand  $command
	 * @return void
	 */
	public function handle(StoreUserLessonResultCommand $command)
	{
        $user = User::find($command->userId);
        $lesson = Lesson::find($command->lessonId);

        $user->lessons()->save($lesson, ['score' => $command->score]);
	}

}
