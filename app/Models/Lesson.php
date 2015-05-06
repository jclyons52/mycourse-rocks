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
        return $this->hasMany('\App\Models\Link');
    }

    public function quizzes(){
        return $this->hasMany('\App\Models\Quiz');
    }

    public function product(){
        return $this->belongsTo('\App\Models\Product');
    }

    public function users()
    {
        return $this->belongsToMany('App\User')->withPivot('score');
    }

    public function userScore($userId)
    {
       $user = $this->users()->where('id', $userId)->first();
        if(isset($user->pivot->score)){
            $result = $user->pivot->score;
        }else{
            $result = 0;
        }
        return $result;
    }

}
