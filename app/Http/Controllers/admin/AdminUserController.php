<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\ModifyUserRequest;
use App\User;
use App\Models\Role;
use Mitul\Controller\AppBaseController;
use Response;
use Flash;

class AdminUserController extends AppBaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$users = User::all();

		return view('admin.users.index')->with('users', $users);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$user = User::find($id);


		if(empty($user))
		{
			Flash::error('User not found');
			return redirect(route('admin.users.index'));
		}

		return view('admin.users.edit', compact('user'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, ModifyUserRequest $request)
	{
		
		

		/** @var User $user */
		$user = User::find($id);

		if(empty($user))
		{
			Flash::error('User not found');
			return redirect(route('admin.users.index'));
		}

		$user->fill($request->all());
		$this->syncRoles($user, $request->input('roles'));
		$user->save();

		Flash::message('User updated successfully.');

		return redirect(route('admin.users.index'));
	}

	private function syncRoles(User $user, array $roles)
	{
		$user->roles()->sync($roles);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
        /** @var User user */
        $user = User::find($id);

        if(empty($user))
        {
            Flash::error('User not found');
            return redirect(route('admin.users.index'));
        }

        $user->delete();

        Flash::message('User deleted successfully.');

        return redirect(route('admin.users.index'));
	}

}
