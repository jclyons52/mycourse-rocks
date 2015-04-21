<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateQuizRequest;
use App\Models\Quiz;
use Mitul\Controller\AppBaseController;
use Response;
use Flash;

class AdminQuizController extends AppBaseController
{

	/**
	 * Display a listing of the Quiz.
	 *
	 * @return Response
	 */
	public function index()
	{
		$quizzes = Quiz::all();

		return view('admin.quizzes.index')->with('quizzes', $quizzes);
	}

	/**
	 * Show the form for creating a new Quiz.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('admin.quizzes.create');
	}

	/**
	 * Store a newly created Quiz in storage.
	 *
	 * @param CreateQuizRequest $request
	 *
	 * @return Response
	 */
	public function store(CreateQuizRequest $request)
	{
        $input = $request->all();

		$quiz = Quiz::create($input);

		Flash::message('Quiz saved successfully.');

		return redirect(route('admin.quizzes.index'));
	}

	/**
	 * Display the specified Quiz.
	 *
	 * @param  int $id
	 *
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
	 * Show the form for editing the specified Quiz.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$quiz = Quiz::find($id);

		if(empty($quiz))
		{
			Flash::error('Quiz not found');
			return redirect(route('admin.quizzes.index'));
		}

		return view('admin.quizzes.edit')->with('quiz', $quiz);
	}

	/**
	 * Update the specified Quiz in storage.
	 *
	 * @param  int    $id
	 * @param CreateQuizRequest $request
	 *
	 * @return Response
	 */
	public function update($id, CreateQuizRequest $request)
	{
		/** @var Quiz $quiz */
		$quiz = Quiz::find($id);

		if(empty($quiz))
		{
			Flash::error('Quiz not found');
			return redirect(route('admin.quizzes.index'));
		}

		$quiz->fill($request->all());
		$quiz->save();

		Flash::message('Quiz updated successfully.');

		return redirect(route('admin.quizzes.index'));
	}

	/**
	 * Remove the specified Quiz from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		/** @var Quiz $quiz */
		$quiz = Quiz::find($id);

		if(empty($quiz))
		{
			Flash::error('Quiz not found');
			return redirect(route('admin.quizzes.index'));
		}

		$quiz->delete();

		Flash::message('Quiz deleted successfully.');

		return redirect(route('admin.quizzes.index'));
	}

}
