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
        "product_id",
	];

	public static $rules = [
	    "name" => "required"
	];

    public function files(){

        return $this->belongsToMany('\App\Fileentry');
    }

    public function links(){
        return $this->belongsToMany('\App\Models\Link');
    }

    public function quizzes(){
        return $this->hasMany('\App\Models\Quiz');
    }

}
