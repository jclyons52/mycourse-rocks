<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreatePostRequest;
use App\Libraries\Repositories\PostRepository;
use Illuminate\Support\Facades\Auth;
use Mitul\Controller\AppBaseController;
use Response;
use Flash;

class AdminPostController extends AppBaseController
{

	/** @var  PostRepository */
	private $postRepository;

	function __construct(PostRepository $postRepo)
	{
		$this->postRepository = $postRepo;
	}

	/**
	 * Display a listing of the Post.
	 *
	 * @return Response
	 */
	public function index()
	{
		$posts = $this->postRepository->all();

		return view('admin.posts.index')->with('posts', $posts);
	}

	/**
	 * Show the form for creating a new Post.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('admin.posts.create');
	}

	/**
	 * Store a newly created Post in storage.
	 *
	 * @param CreatePostRequest $request
	 *
	 * @return Response
	 */
	public function store(CreatePostRequest $request)
	{
        $input = $request->all();
        $input['user_id'] = Auth::user()->id;

		$post = $this->postRepository->store($input);

		Flash::message('Post saved successfully.');

		return redirect(route('admin.posts.index'));
	}

	/**
	 * Display the specified Post.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$post = $this->postRepository->findPostById($id);

		if(empty($post))
		{
			Flash::error('Post not found');
			return redirect(route('admin.posts.index'));
		}

		return view('admin.posts.show')->with('post', $post);
	}

	/**
	 * Show the form for editing the specified Post.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$post = $this->postRepository->findPostById($id);

		if(empty($post))
		{
			Flash::error('Post not found');
			return redirect(route('admin.posts.index'));
		}

		return view('admin.posts.edit')->with('post', $post);
	}

	/**
	 * Update the specified Post in storage.
	 *
	 * @param  int    $id
	 * @param CreatePostRequest $request
	 *
	 * @return Response
	 */
	public function update($id, CreatePostRequest $request)
	{
		$post = $this->postRepository->findPostById($id);

		if(empty($post))
		{
			Flash::error('Post not found');
			return redirect(route('admin.posts.index'));
		}

		$post = $this->postRepository->update($post, $request->all());

		Flash::message('Post updated successfully.');

		return redirect(route('admin.posts.index'));
	}

	/**
	 * Remove the specified Post from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$post = $this->postRepository->findPostById($id);

		if(empty($post))
		{
			Flash::error('Post not found');
			return redirect(route('admin.posts.index'));
		}

		$post->delete();

		Flash::message('Post deleted successfully.');

		return redirect(route('admin.posts.index'));
	}

}
