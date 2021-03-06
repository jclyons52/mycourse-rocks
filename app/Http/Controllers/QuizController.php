<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\CreateQuizRequest;
use App\Models\Quiz;
use Illuminate\Http\Request;
use Laracasts\Flash\Flash;

class QuizController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $quizzes = Quiz::all();

        return view('site.quizzes.index')->with('quizzes', $quizzes);
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
	public function store(CreateQuizRequest $request)
	{
        $input = $request->all();

        $quiz = Quiz::create($input);

        Flash::message('Quiz saved successfully.');

        return redirect(route('lessons.edit', [$quiz->lesson_id]))->with('active_tab', 'quiz');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
        $quiz = Quiz::find($id);

        if(empty($quiz))
        {
            Flash::error('Quiz not found');
            return redirect(route('admin.quizzes.index'));
        }

        return view('admin.quizzes.show')->with('quiz', $quiz);
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

}
