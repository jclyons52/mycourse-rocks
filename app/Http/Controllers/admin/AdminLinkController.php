<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateLinkRequest;
use App\Models\Link;
use Mitul\Controller\AppBaseController;
use Response;
use Flash;

class AdminLinkController extends AppBaseController
{

	/**
	 * Display a listing of the Link.
	 *
	 * @return Response
	 */
	public function index()
	{
		$links = Link::all();

		return view('admin.links.index')->with('links', $links);
	}

	/**
	 * Show the form for creating a new Link.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('admin.links.create');
	}

	/**
	 * Store a newly created Link in storage.
	 *
	 * @param CreateLinkRequest $request
	 *
	 * @return Response
	 */
	public function store(CreateLinkRequest $request)
	{
        $input = $request->all();

		$link = Link::create($input);

		Flash::message('Link saved successfully.');

		return redirect(route('admin.links.index'));
	}

	/**
	 * Display the specified Link.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$link = Link::find($id);

		if(empty($link))
		{
			Flash::error('Link not found');
			return redirect(route('admin.links.index'));
		}

		return view('admin.links.show')->with('link', $link);
	}

	/**
	 * Show the form for editing the specified Link.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$link = Link::find($id);

		if(empty($link))
		{
			Flash::error('Link not found');
			return redirect(route('admin.links.index'));
		}

		return view('admin.links.edit')->with('link', $link);
	}

	/**
	 * Update the specified Link in storage.
	 *
	 * @param  int    $id
	 * @param CreateLinkRequest $request
	 *
	 * @return Response
	 */
	public function update($id, CreateLinkRequest $request)
	{
		/** @var Link $link */
		$link = Link::find($id);

		if(empty($link))
		{
			Flash::error('Link not found');
			return redirect(route('admin.links.index'));
		}

		$link->fill($request->all());
		$link->save();

		Flash::message('Link updated successfully.');

		return redirect(route('admin.links.index'));
	}

	/**
	 * Remove the specified Link from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		/** @var Link $link */
		$link = Link::find($id);

		if(empty($link))
		{
			Flash::error('Link not found');
			return redirect(route('admin.links.index'));
		}

		$link->delete();

		Flash::message('Link deleted successfully.');

		return redirect(route('admin.links.index'));
	}

}
