<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreatePermissionsRequest;
use App\Models\Permissions;
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
		$permissions = Permissions::all();

		return view('permissions.index')->with('permissions', $permissions);
	}

	/**
	 * Show the form for creating a new Permissions.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('permissions.create');
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

		$permissions = Permissions::create($input);

		Flash::message('Permissions saved successfully.');

		return redirect(route('permissions.index'));
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
		$permissions = Permissions::find($id);

		if(empty($permissions))
		{
			Flash::error('Permissions not found');
			return redirect(route('permissions.index'));
		}

		return view('permissions.show')->with('permissions', $permissions);
	}

	/**
	 * Show the form for editing the specified Permissions.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$permissions = Permissions::find($id);

		if(empty($permissions))
		{
			Flash::error('Permissions not found');
			return redirect(route('permissions.index'));
		}

		return view('permissions.edit')->with('permissions', $permissions);
	}

	/**
	 * Update the specified Permissions in storage.
	 *
	 * @param  int    $id
	 * @param CreatePermissionsRequest $request
	 *
	 * @return Response
	 */
	public function update($id, CreatePermissionsRequest $request)
	{
		/** @var Permissions $permissions */
		$permissions = Permissions::find($id);

		if(empty($permissions))
		{
			Flash::error('Permissions not found');
			return redirect(route('permissions.index'));
		}

		$permissions->fill($request->all());
		$permissions->save();

		Flash::message('Permissions updated successfully.');

		return redirect(route('permissions.index'));
	}

	/**
	 * Remove the specified Permissions from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		/** @var Permissions $permissions */
		$permissions = Permissions::find($id);

		if(empty($permissions))
		{
			Flash::error('Permissions not found');
			return redirect(route('permissions.index'));
		}

		$permissions->delete();

		Flash::message('Permissions deleted successfully.');

		return redirect(route('permissions.index'));
	}

}
