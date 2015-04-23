<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    
	public $table = "quizzes";

	public $primaryKey = "id";
    
	public $timestamps = true;

	public $fillable = [
	    "lesson_id",
		"question",
		"answer",
		"false_answer1",
		"false_answer2",
		"false_answer3",
        "lessson_id"
	];

	public static $rules = [
	    "answer" => "required"
	];

}
