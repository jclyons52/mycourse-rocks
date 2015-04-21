<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateLessonRequest;
use App\Models\Lesson;
use Mitul\Controller\AppBaseController;
use Response;
use Flash;

class AdminLessonController extends AppBaseController
{

	/**
	 * Display a listing of the Lesson.
	 *
	 * @return Response
	 */
	public function index()
	{
		$lessons = Lesson::all();

		return view('admin.lessons.index')->with('lessons', $lessons);
	}

	/**
	 * Show the form for creating a new Lesson.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('admin.lessons.create');
	}

	/**
	 * Store a newly created Lesson in storage.
	 *
	 * @param CreateLessonRequest $request
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

		return redirect(route('admin.lessons.index'));
	}

	/**
	 * Display the specified Lesson.
	 *
	 * @param  int $id
	 *
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

		return view('admin.lessons.show')->with('lesson', $lesson);
	}

	/**
	 * Show the form for editing the specified Lesson.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$lesson = Lesson::find($id);

		if(empty($lesson))
		{
			Flash::error('Lesson not found');
			return redirect(route('admin.lessons.index'));
		}

		return view('admin.lessons.edit')->with('lesson', $lesson);
	}

	/**
	 * Update the specified Lesson in storage.
	 *
	 * @param  int    $id
	 * @param CreateLessonRequest $request
	 *
	 * @return Response
	 */
	public function update($id, CreateLessonRequest $request)
	{
		/** @var Lesson $lesson */
		$lesson = Lesson::find($id);

		if(empty($lesson))
		{
			Flash::error('Lesson not found');
			return redirect(route('admin.lessons.index'));
		}

		$lesson->fill($request->all());
		$lesson->save();

		Flash::message('Lesson updated successfully.');

		return redirect(route('admin.lessons.index'));
	}

	/**
	 * Remove the specified Lesson from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		/** @var Lesson $lesson */
		$lesson = Lesson::find($id);

		if(empty($lesson))
		{
			Flash::error('Lesson not found');
			return redirect(route('admin.lessons.index'));
		}

		$lesson->delete();

		Flash::message('Lesson deleted successfully.');

		return redirect(route('admin.lessons.index'));
	}

    private function syncFiles($lesson, $links)
    {
        $user->roles()->sync($roles);
    }

}
