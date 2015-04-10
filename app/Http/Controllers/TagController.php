<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateTagRequest;
use App\Models\Tag;
use Mitul\Controller\AppBaseController;
use Response;
use Flash;

class TagController extends AppBaseController
{

	/**
	 * Display a listing of the Tag.
	 *
	 * @return Response
	 */
	public function index()
	{
		$tags = Tag::all();

		return view('admin.tags.index')->with('tags', $tags);
	}

	/**
	 * Show the form for creating a new Tag.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('admin.tags.create');
	}

	/**
	 * Store a newly created Tag in storage.
	 *
	 * @param CreateTagRequest $request
	 *
	 * @return Response
	 */
	public function store(CreateTagRequest $request)
	{
        $input = $request->all();

		$tag = Tag::create($input);

		Flash::message('Tag saved successfully.');

		return redirect(route('admin.tags.index'));
	}

	/**
	 * Display the specified Tag.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$tag = Tag::find($id);

		if(empty($tag))
		{
			Flash::error('Tag not found');
			return redirect(route('admin.tags.index'));
		}

		return view('admin.tags.show')->with('tag', $tag);
	}

	/**
	 * Show the form for editing the specified Tag.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$tag = Tag::find($id);

		if(empty($tag))
		{
			Flash::error('Tag not found');
			return redirect(route('admin.tags.index'));
		}

		return view('admin.tags.edit')->with('tag', $tag);
	}

	/**
	 * Update the specified Tag in storage.
	 *
	 * @param  int    $id
	 * @param CreateTagRequest $request
	 *
	 * @return Response
	 */
	public function update($id, CreateTagRequest $request)
	{
		/** @var Tag $tag */
		$tag = Tag::find($id);

		if(empty($tag))
		{
			Flash::error('Tag not found');
			return redirect(route('admin.tags.index'));
		}

		$tag->fill($request->all());
		$tag->save();

		Flash::message('Tag updated successfully.');

		return redirect(route('admin.tags.index'));
	}

	/**
	 * Remove the specified Tag from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		/** @var Tag $tag */
		$tag = Tag::find($id);

		if(empty($tag))
		{
			Flash::error('Tag not found');
			return redirect(route('admin.tags.index'));
		}

		$tag->delete();

		Flash::message('Tag deleted successfully.');

		return redirect(route('admin.tags.index'));
	}

}
