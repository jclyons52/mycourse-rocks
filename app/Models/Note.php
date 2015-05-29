<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    
	public $table = "notes";

	public $primaryKey = "id";
    
	public $timestamps = true;

	public $fillable = [
	    "user_id",
		"lesson_id",
		"body"
	];

	public static $rules = [
	    "user_id" => "required",
		"lesson_id" => "required"
	];

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function lesson(){
        return $this->belongsTo('App\Models\Lesson');
    }

}
