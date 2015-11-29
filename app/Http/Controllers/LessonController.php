<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\CreateLessonRequest;
use App\Models\Lesson;
use App\Models\Link;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Laracasts\Flash\Flash;

class LessonController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $lessons = Lesson::all();

        return view('site.lessons.index')->with('lessons', $lessons);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create($product_id)
	{
        $product = Product::find($product_id);
        return view('site.lessons.create')
            ->with('product_id', $product_id)
            ->with('product', $product);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(CreateLessonRequest $request)
	{
        $input = $request->all();
        $lesson = Lesson::create($input);

        $links = $request->input('links');

        if($links) {
            $this->sync($lesson, $links);
        }

        Flash::message('Lesson saved successfully.');

        return redirect(route('lessons.edit',[$lesson->id]));
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$links = Link::all();

        $lesson = Lesson::findOrFail($id);

		$videos = $lesson->links->filter(function($item){
			if($item->iframe == "") {
				return;
			}

			return $item;
		});

		foreach($videos as $link){
			$re = "/src=\\\"(.*?)\\\"/";
			preg_match($re, $link->iframe, $matches);
			if($matches){
				$link->iframe = $matches[1];
				$link->save();
			}
		}


        return view('site.lessons.show')->with(['lesson' => $lesson, 'videos' => $videos]);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit(Request $request ,$id)
	{
        if( null !== Session::get('active_tab'))
        {
            $active_tab = Session::get('active_tab');
        }
        else
        {
            $active_tab = 'links';
        }

        $lesson = Lesson::findOrFail($id);

		return view('site.lessons.edit')
            ->with('lesson', $lesson)
            ->with('product_id', $lesson->product->id)
            ->with('active_tab', $active_tab);
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

    public function links($id)
    {
        $links = Link::where('lesson_id','=', $id)->get();

        return $links;
    }

}
