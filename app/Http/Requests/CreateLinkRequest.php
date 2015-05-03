<?php namespace App\Http\Requests;

use App\Http\Requests\Request;
use App\Models\Lesson;
use App\Models\Link;
use Illuminate\Support\Facades\Auth;

class CreateLinkRequest extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
        $lesson = Lesson::find($this->input('lesson_id'));

        $product = $lesson->product;

        $users = $product->owner()->lists('id');

        return in_array(Auth::id(), $users);


	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return Link::$rules;
	}

}
