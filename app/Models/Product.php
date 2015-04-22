<?php namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

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

    public function files(){

        return $this->belongsToMany('\App\Fileentry');
    }

    public function comments(){
        return $this->hasMany('\App\Models\Comment');
    }

    public function lessons(){
        return $this->hasMany('App\Models\Lesson');
    }

    public function rating()
    {
        return number_format(Comment::where('product_id', '=', $this->id)->avg('rating'), 2);
    }

    public function scopePopular($query)
    {
        return $query->select(DB::raw('products.*, count(*) as `aggregate`'))
            ->join('comments', 'products.id', '=', 'comments.product_id')
            ->groupBy('product_id')
            ->orderBy('aggregate', 'desc');
    }

    public function isFavoritedBy(User $user)
    {
        $favorites = $user->products()->lists('product_id');

        return in_array($this->id, $favorites);
    }


}
