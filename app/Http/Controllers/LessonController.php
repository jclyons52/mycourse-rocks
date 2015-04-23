<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\CreateLessonRequest;
use App\Models\Lesson;
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
//        dd($product_id);
        return view('site.lessons.create')->with('product_id', $product_id);
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
        $lesson = Lesson::find($id);

        if(empty($lesson))
        {
            Flash::error('Lesson not found');
            return redirect(route('admin.lessons.index'));
        }

        return view('site.lessons.show')->with('lesson', $lesson);
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

        $lesson = Lesson::find($id);

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

}
