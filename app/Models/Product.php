<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

	public $table = "products";

	public $primaryKey = "id";

	public $timestamps = true;

	public $fillable = [
	    "name",
		"price",
		"description",
		"category"
	];

	public static $rules = [
	    "name" => "required",
		"price" => "required"
	];

    public function tags(){

        return $this->belongsToMany('\App\Models\Tag');
    }

    public function category(){

        return $this->belongsTo('\App\Models\Category');
    }

}
