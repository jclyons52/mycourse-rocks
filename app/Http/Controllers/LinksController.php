<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\CreateLinkRequest;
use App\Http\Requests\ModifyLinkRequest;
use App\Libraries\Links\HighLight;
use App\Libraries\Links\LinkPreview;
use App\Libraries\Links\SetUp;
use App\Models\Link;
use Illuminate\Http\Request;
use Laracasts\Flash\Flash;

class LinksController extends Controller {

    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index','show']]);
    }
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

//        $input = $this->format_url($input);

        $link = Link::create($input);


        Flash::message('Link saved successfully.');

        return $link;
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
	public function destroy(ModifyLinkRequest $request)
	{
        /** @var Link $link */
        $link = Link::find($request->input('id'));

        if(empty($link))
        {
            Flash::error('Link not found');
            return redirect(route('admin.links.index'));
        }

        $link->delete();

        Flash::message('Link deleted successfully.');

        return redirect(route('lessons.edit', [$link->lesson_id]))->with('active_tab', 'links');

	}

    public function textCrawler(Request $request)
    {
        SetUp::init();
        $input = $request->all();
        $text = $input["text"];
        $imageQuantity = $_POST["imagequantity"];
        $text = " " . str_replace("\n", " ", $text);
        $header = "";

        $linkPreview = new LinkPreview();
        $answer = $linkPreview->crawl($text, $imageQuantity, $header);

        SetUp::finish();
        return $answer;
    }

    public function highlighter(Request $request){
//        dd('test test test');
        SetUp::init();

        error_reporting(false);
        $input = $request->all();
        $text = $input["text"];
        $description = $input["description"];

        $answer = array("urls" => HighLight::url($text), "description" => HighLight::url($description));

        return $answer;
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
