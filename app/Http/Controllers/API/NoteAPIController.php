<?php namespace App\Http\Controllers\API;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Mitul\Controller\AppBaseController;
use Mitul\Generator\Exceptions\AppValidationException;
use Mitul\Generator\Exceptions\RecordNotFoundException;
use Mitul\Generator\Utils\ResponseManager;
use App\Models\Note;
use Illuminate\Http\Request;
use App\Libraries\Repositories\NoteRepository;
use Response;

class NoteAPIController extends AppBaseController
{

	/** @var  NoteRepository */
	private $noteRepository;

	function __construct(NoteRepository $noteRepo)
	{
		$this->noteRepository = $noteRepo;
	}

	/**
	 * Display a listing of the Note.
	 *
	 * @return Response
	 */
	public function index(Request $request)
	{
        $input = $request->all();
		$input['user_id'] = Auth::id();

        $result = $this->noteRepository->search($input);

        return Response::json(ResponseManager::makeResult($result->toArray(), "Notes retrieved successfully."));
	}


	/**
	 * Show the form for creating a new Note.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created Note in storage.
	 *
	 * @param Request $request
	 *
	 * @return Response
	 * @throws AppValidationException
	 */
	public function store(Request $request)
	{
		if(sizeof(Note::$rules) > 0)
            $this->validateRequest($request, Note::$rules);

        $input = $request->all();
		$input['user_id'] = Auth::id();

		$note = $this->noteRepository->store($input);

		return Response::json(ResponseManager::makeResult($note->toArray(), "Note saved successfully."));
	}

	/**
	 * Display the specified Note.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 * @throws RecordNotFoundException
	 */
	public function show($id)
	{
		$note = $this->noteRepository->findNoteById($id);

		if(empty($note))
			throw new RecordNotFoundException("Note not found", ERROR_CODE_RECORD_NOT_FOUND);

		return Response::json(ResponseManager::makeResult($note->toArray(), "Note retrieved successfully."));
	}

	/**
	 * Show the form for editing the specified Note.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified Note in storage.
	 *
	 * @param  int    $id
	 * @param Request $request
	 *
	 * @return Response
	 * @throws RecordNotFoundException
	 */
	public function update($id, Request $request)
	{
		$note = $this->noteRepository->findNoteById($id);

		if(empty($note))
			throw new RecordNotFoundException("Note not found", ERROR_CODE_RECORD_NOT_FOUND);

		$input = $request->all();

		$note = $this->noteRepository->update($note, $input);

		return Response::json(ResponseManager::makeResult($note->toArray(), "Note updated successfully."));
	}

	/**
	 * Remove the specified Note from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 * @throws RecordNotFoundException
	 */
	public function destroy($id)
	{
		$note = $this->noteRepository->findNoteById($id);

		if(empty($note))
			throw new RecordNotFoundException("Note not found", ERROR_CODE_RECORD_NOT_FOUND);

		$note->delete();

		return Response::json(ResponseManager::makeResult($id, "Note deleted successfully."));
	}

}
