<?php namespace App\Http\Controllers;

use App\Commands\FollowUserCommand;
use App\Commands\UnfollowUserCommand;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laracasts\Flash\Flash;

class FollowsController extends Controller {

    /**
     * Follow a user.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $input = $request->all();

        $this->dispatch(new FollowUserCommand(Auth::id(),$input['userIdToFollow'] ));

        Flash::success('You are now following this user.');

        return redirect()->back();
    }

    /**
     * Unfollow a user.
     *
     * @param $userIdToUnfollow
     * @internal param int $id
     * @return Response
     */
    public function destroy($userIdToUnfollow)
    {

        $this->dispatch(new UnfollowUserCommand( Auth::id(), $userIdToUnfollow ));

        Flash::success('You have now unfollowed this user.');

        return redirect()->back();
    }

}
