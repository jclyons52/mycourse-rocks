<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

	public $table = "categories";

	public $primaryKey = "id";

	public $timestamps = true;

	public $fillable = [
	    "name"
	];

	public static $rules = [
	    "name" => "required"
	];

    public function products(){
        return $this->hasMany('\App\Models\Product');
    }
}
