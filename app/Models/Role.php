<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{

	public $table = "roles";

	public $primaryKey = "id";

	public $timestamps = true;

	public $fillable = [
	    "name"
	];

	public static $rules = [
	    "name" => "required"
	];

    public function permissions()
    {
        return $this->belongsToMany('App\Models\Permission');
    }

}
