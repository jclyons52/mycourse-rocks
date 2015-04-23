<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\CreateLinkRequest;
use App\Models\Link;
use Illuminate\Http\Request;
use Laracasts\Flash\Flash;

class LinksController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
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
	public function store(CreateLinkRequest $request)
	{
        $input = $request->all();

        $input = $this->format_url($input);

        $link = Link::create($input);


        Flash::message('Link saved successfully.');

        return redirect(route('lessons.edit', [$link->lesson_id]));
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
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
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

    /**
     * @param $input
     * @param $id
     * @return mixed
     */
    public function format_url($input)
    {
        $url = $input['url'];

        if (preg_match('/youtube\.com\/watch\?v=([^\&\?\/!"]+)/', $url, $id)) {
            $values = $id[1];
        } else if (preg_match('/youtube\.com\/embed\/([^\&\?\/!"]+)/', $url, $id)) {
            $values = $id[1];
        } else if (preg_match('/youtube\.com\/v\/([^\&\?\/!"]+)/', $url, $id)) {
            $values = $id[1];
        } else if (preg_match('/youtu\.be\/([^\&\?\/!"]+)/', $url, $id)) {
            $values = $id[1];
        } else if (preg_match('/youtube\.com\/verify_age\?next_url=\/watch%3Fv%3D([^\&\?\/!"]+)/', $url, $id)) {
            $values = $id[1];
        } else {
            // not an youtube video
        }

        $new_url = 'https://www.youtube.com/embed/' . $values;

        $input['url'] = $new_url;

        return $input;
    }

}
