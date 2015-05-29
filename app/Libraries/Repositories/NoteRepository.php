<?php

namespace App\Libraries\Repositories;


use App\Models\Note;
use Illuminate\Support\Facades\Schema;

class NoteRepository
{

	/**
	 * Returns all Notes
	 *
	 * @return \Illuminate\Database\Eloquent\Collection|static[]
	 */
	public function all()
	{
		return Note::all();
	}

    public function search($input)
    {
        $query = Note::query();

        $columns = Schema::getColumnListing('notes');
        $attributes = array();

        foreach($columns as $attribute){
            if(isset($input[$attribute]))
            {
                $query->where($attribute, $input[$attribute]);
                $attributes[$attribute] =  $input[$attribute];
            }else{
                $attributes[$attribute] =  null;
            }
        };

        return $query->get();

    }

	/**
	 * Stores Note into database
	 *
	 * @param array $input
	 *
	 * @return Note
	 */
	public function store($input)
	{
		return Note::create($input);
	}

	/**
	 * Find Note by given id
	 *
	 * @param int $id
	 *
	 * @return \Illuminate\Support\Collection|null|static|Note
	 */
	public function findNoteById($id)
	{
		return Note::find($id);
	}

	/**
	 * Updates Note into database
	 *
	 * @param Note $note
	 * @param array $input
	 *
	 * @return Note
	 */
	public function update($note, $input)
	{
		$note->fill($input);
		$note->save();

		return $note;
	}
}