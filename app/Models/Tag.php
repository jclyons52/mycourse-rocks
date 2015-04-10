<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{

	public $table = "tags";

	public $primaryKey = "id";

	public $timestamps = true;

	public $fillable = [
	    "name"
	];

	public static $rules = [
	    "name" => "required"
	];

    public function products()
    {
        return $this->belongsToMany('\App\Models\Products');
    }
}
