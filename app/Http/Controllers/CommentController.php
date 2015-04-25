<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateCommentRequest;
use App\Libraries\Repositories\CommentRepository;
use Illuminate\Support\Facades\Auth;
use Mitul\Controller\AppBaseController;

use Response;
use Flash;

class CommentController extends AppBaseController
{

	/** @var  CommentRepository */
	private $commentRepository;

	function __construct(CommentRepository $commentRepo)
	{
		$this->commentRepository = $commentRepo;
	}

	/**
	 * Display a listing of the Comment.
	 *
	 * @return Response
	 */
	public function index()
	{
		$comments = $this->commentRepository->all();

		return view('comments.index')->with('comments', $comments);
	}

	/**
	 * Show the form for creating a new Comment.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('comments.create');
	}

	/**
	 * Store a newly created Comment in storage.
	 *
	 * @param CreateCommentRequest $request
	 *
	 * @return Response
	 */
	public function store(CreateCommentRequest $request)
	{
        $input = $request->all();
//        dd($input);
        $input['user_id'] = Auth::user()->id;

		$comment = $this->commentRepository->store($input);

		Flash::message('Comment saved successfully.');

		return back();
	}

	/**
	 * Display the specified Comment.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$comment = $this->commentRepository->findCommentById($id);

		if(empty($comment))
		{
			Flash::error('Comment not found');
			return redirect(route('comments.index'));
		}

		return view('comments.show')->with('comment', $comment);
	}

	/**
	 * Show the form for editing the specified Comment.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
//		$comment = $this->commentRepository->findCommentById($id);
//
//		if(empty($comment))
//		{
//			Flash::error('Comment not found');
//			return redirect(route('comments.index'));
//		}
//
//		return view('comments.edit')->with('comment', $comment);
	}

	/**
	 * Update the specified Comment in storage.
	 *
	 * @param  int    $id
	 * @param CreateCommentRequest $request
	 *
	 * @return Response
	 */
	public function update($id, CreateCommentRequest $request)
	{
//		$comment = $this->commentRepository->findCommentById($id);
//
//		if(empty($comment))
//		{
//			Flash::error('Comment not found');
//			return redirect(route('comments.index'));
//		}
//
//		$comment = $this->commentRepository->update($comment, $request->all());
//
//		Flash::message('Comment updated successfully.');
//
//		return redirect(route('comments.index'));
	}

	/**
	 * Remove the specified Comment from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
//		$comment = $this->commentRepository->findCommentById($id);
//
//		if(empty($comment))
//		{
//			Flash::error('Comment not found');
//			return redirect(route('comments.index'));
//		}
//
//		$comment->delete();
//
//		Flash::message('Comment deleted successfully.');
//
//		return redirect(route('comments.index'));
	}

}
