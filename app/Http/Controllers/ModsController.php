<?php namespace App\Http\Controllers;

use App\Commands\AddModCommand;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Laracasts\Flash\Flash;

class ModsController extends Controller {

	/**
	 * Store a newly created resource in storage.
	 *
	 */
	public function store(Request $request)
	{
        $input = $request->all();

        $this->dispatch(new AddModCommand($input['user_id'],$input['product_id'] ));

        Flash::success('Moderator Added');

        return redirect()->back();
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
