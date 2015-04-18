<?php

namespace App\Libraries\Repositories;


use App\Models\Comment;

class CommentRepository
{

	/**
	 * Returns all Comments
	 *
	 * @return \Illuminate\Database\Eloquent\Collection|static[]
	 */
	public function all()
	{
		return Comment::all();
	}

	/**
	 * Stores Comment into database
	 *
	 * @param array $input
	 *
	 * @return Comment
	 */
	public function store($input)
	{
		return Comment::create($input);
	}

	/**
	 * Find Comment by given id
	 *
	 * @param int $id
	 *
	 * @return \Illuminate\Support\Collection|null|static|Comment
	 */
	public function findCommentById($id)
	{
		return Comment::find($id);
	}

	/**
	 * Updates Comment into database
	 *
	 * @param Comment $comment
	 * @param array $input
	 *
	 * @return Comment
	 */
	public function update($comment, $input)
	{
		$comment->fill($input);
		$comment->save();

		return $comment;
	}
}