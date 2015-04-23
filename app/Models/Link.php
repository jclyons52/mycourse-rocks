<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Link extends Model
{

	public $table = "links";

	public $primaryKey = "id";

	public $timestamps = true;

	public $fillable = [
	    "url",
		"name",
        "lesson_id"
	];

	public static $rules = [
	    "url" => "required"
	];

}
