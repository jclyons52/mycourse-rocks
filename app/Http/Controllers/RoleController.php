<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateRoleRequest;
use App\Models\Role;
use App\Models\Permission;
use Mitul\Controller\AppBaseController;
use Response;
use Flash;

class RoleController extends AppBaseController
{

	/**
	 * Display a listing of the Role.
	 *
	 * @return Response
	 */
	public function index()
	{
		$roles = Role::all();

		return view('admin.roles.index')->with('roles', $roles);
	}

	/**
	 * Show the form for creating a new Role.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('admin.roles.create');
	}

	/**
	 * Store a newly created Role in storage.
	 *
	 * @param CreateRoleRequest $request
	 *
	 * @return Response
	 */
	public function store(CreateRoleRequest $request)
	{
        $input = $request->all();

		$role = Role::create($input);

		Flash::message('Role saved successfully.');

		return redirect(route('admin.roles.index'));
	}

	/**
	 * Display the specified Role.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$role = Role::find($id);

		if(empty($role))
		{
			Flash::error('Role not found');
			return redirect(route('admin.roles.index'));
		}

		return view('admin.roles.show')->with('role', $role);
	}

	/**
	 * Show the form for editing the specified Role.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$role = Role::find($id);

		if(empty($role))
		{
			Flash::error('Role not found');
			return redirect(route('admin.roles.index'));
		}

		return view('admin.roles.edit', compact('role'));
	}

	/**
	 * Update the specified Role in storage.
	 *
	 * @param  int    $id
	 * @param CreateRoleRequest $request
	 *
	 * @return Response
	 */
	public function update($id, CreateRoleRequest $request)
	{
		/** @var Role $role */
		$role = Role::find($id);

		if(empty($role))
		{
			Flash::error('Role not found');
			return redirect(route('admin.roles.index'));
		}

		$role->fill($request->all());
        $this->syncPermissions($role, $request->input('permissions'));
		$role->save();

		Flash::message('Role updated successfully.');

		return redirect(route('admin.roles.index'));
	}

	/**
	 * Remove the specified Role from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		/** @var Role $role */
		$role = Role::find($id);

		if(empty($role))
		{
			Flash::error('Role not found');
			return redirect(route('admin.roles.index'));
		}

		$role->delete();

		Flash::message('Role deleted successfully.');

		return redirect(route('admin.roles.index'));
	}

    private function syncPermissions($role, $input)
    {
        $role->permissions()->sync($input);
    }

}
