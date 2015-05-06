<?php namespace App\Commands;

use App\Commands\Command;

class StoreUserLessonResultCommand extends Command {

        /**
         * @var
         */
        public $userId;

        /**
         * @var
         */
        public $lessonId;

        /**
         * @var
         */
        public $score;

        /**
         * @param $userId
         * @param $userIdToFollow
         */
        /**
         * Create a new command instance.
         *
         * @return void
         */
        public function __construct($userId, $lessonId, $score)
    {
        $this->userId = $userId;
        $this->lessonId = $lessonId;
        $this->score = $score;

    }

}
