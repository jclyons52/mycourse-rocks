<?php namespace App\Http\Controllers;

use App\Commands\FavoriteProductCommand;
use App\Commands\UnfavoriteProductCommand;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laracasts\Flash\Flash;

class FavoritesController extends Controller {

    /**
     * Follow a user.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $input = $request->all();

        $this->dispatch(new FavoriteProductCommand(Auth::id(),$input['productIdToFavorite'] ));

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
    public function destroy($productIdToUnfavorite)
    {

        $this->dispatch(new UnfavoriteProductCommand( Auth::id(), $productIdToUnfavorite ));

        Flash::success('You have now unfollowed this user.');

        return redirect()->back();
    }

}
