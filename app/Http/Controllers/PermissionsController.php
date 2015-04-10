<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreatePermissionsRequest;
use App\Models\Permission;
use Mitul\Controller\AppBaseController;
use Response;
use Flash;

class PermissionsController extends AppBaseController
{

	/**
	 * Display a listing of the Permissions.
	 *
	 * @return Response
	 */
	public function index()
	{
		$permissions = Permission::all();

		return view('admin.permissions.index')->with('permissions', $permissions);
	}

	/**
	 * Show the form for creating a new Permissions.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('admin.permissions.create');
	}

	/**
	 * Store a newly created Permissions in storage.
	 *
	 * @param CreatePermissionsRequest $request
	 *
	 * @return Response
	 */
	public function store(CreatePermissionsRequest $request)
	{
        $input = $request->all();

		$permissions = Permission::create($input);

		Flash::message('Permissions saved successfully.');

		return redirect(route('admin.permissions.index'));
	}

	/**
	 * Display the specified Permissions.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$permissions = Permission::find($id);

		if(empty($permissions))
		{
			Flash::error('Permissions not found');
			return redirect(route('admin.permissions.index'));
		}

		return view('admin.permissions.show')->with('permissions', $permissions);
	}

	/**
	 * Show the form for editing the specified Permission.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$permissions = Permission::find($id);

		if(empty($permissions))
		{
			Flash::error('Permissions not found');
			return redirect(route('admin.permissions.index'));
		}

		return view('admin.permissions.edit')->with('permissions', $permissions);
	}

	/**
	 * Update the specified Permission in storage.
	 *
	 * @param  int    $id
	 * @param CreatePermissionsRequest $request
	 *
	 * @return Response
	 */
	public function update($id, CreatePermissionsRequest $request)
	{
		/** @var Permission $permissions */
		$permission = Permission::find($id);

		if(empty($permission))
		{
			Flash::error('Permissions not found');
			return redirect(route('admin.permissions.index'));
		}

		$permission->fill($request->all());
		$permission->save();

		Flash::message('Permissions updated successfully.');

		return redirect(route('admin.permissions.index'));
	}

	/**
	 * Remove the specified Permission from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		/** @var Permission $permissions */
		$permission = Permission::find($id);

		if(empty($permission))
		{
			Flash::error('Permissions not found');
			return redirect(route('admin.permissions.index'));
		}

		$permission->delete();

		Flash::message('Permission deleted successfully.');

		return redirect(route('admin.permissions.index'));
	}

}
