<?php namespace App\Http\Requests;

use App\Http\Requests\Request;
use App\Models\Lesson;
use App\Models\Link;
use Illuminate\Support\Facades\Auth;

class ModifyLinkRequest extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
//        dd($this->input('id'));
        $link = Link::find($this->input('id'));
        $lesson = Lesson::find($link->lesson_id);

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
		return [
			//
		];
	}

}
