<?php namespace App\Http\Controllers;

use App\Commands\StoreUserLessonResultCommand;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laracasts\Flash\Flash;

class UserLessonResultController extends Controller {


    public function store(Request $request)
    {
        $input = $request->all();

        $this->dispatch(new StoreUserLessonResultCommand(Auth::id(),$input['lesson_id'], $input['quiz_result'] ));

        Flash::success('Results Saved');

        return redirect()->back();
    }

    /**
     * Unfollow a user.
     *
     * @param $userIdToUnfollow
     * @internal param int $id
     * @return Response
     */
//    public function destroy($userIdToUnfollow)
//    {
//
//        $this->dispatch(new UnfollowUserCommand( Auth::id(), $userIdToUnfollow ));
//
//        Flash::success('You have now unfollowed this user.');
//
//        return redirect()->back();
//    }

}
