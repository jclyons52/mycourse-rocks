<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'links' => 'array',
    ];

	public $table = "lessons";

	public $primaryKey = "id";

	public $timestamps = true;

	public $fillable = [
	    "name",
		"description",
        "links"
	];

	public static $rules = [
	    "name" => "required"
	];

    public function files(){

        return $this->belongsToMany('\App\Fileentry');
    }


}
