<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{

	public $table = "comments";

	public $primaryKey = "id";

	public $timestamps = true;

	public $fillable = [
	    "content",
		"rating",
        "user_id",
        "product_id"
	];

	public static $rules = [
	    "content" => "required"
	];

    public function user(){
        return $this->belongsTo('App\User');
    }
}
