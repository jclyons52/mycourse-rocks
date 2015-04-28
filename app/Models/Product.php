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
		"category_id",
        "fileentry_id"

	];

    public static $rules = [
        "name"         => "required",
        "description"  => "required",
        "category_id"  => "required",
        "files" => "required"
    ];

    public function tags(){

        return $this->belongsToMany('\App\Models\Tag');
    }

    public function category(){

        return $this->belongsTo('\App\Models\Category');
    }

    public function file(){

        return $this->belongsTo('\App\Fileentry', 'fileentry_id');
    }

    public function comments(){

        return $this->hasMany('\App\Models\Comment');
    }

    public function lessons(){

        return $this->hasMany('\App\Models\Lesson');
    }

    public  function users(){
        return $this->belongsToMany('\App\User');
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
        $favorites = $user->products()->wherePivot('favorite', '1')->lists('product_id');

        return in_array($this->id, $favorites);
    }

    public function isOwnedBy(User $user)
    {
        $owned = $user->products()->wherePivot('owner', '1')->lists('product_id');

        return in_array($this->id, $owned);
    }

    public function owner()
    {
        return $this->users()->wherePivot('owner', '1')->first();
    }
    public function mods()
    {
        return $this->users()->wherePivot('mod', '1')->get();
    }

    public function favorited_count()
    {
        $count = $this->users()->wherePivot('favorite', true)->count();

        return $count;

    }


}
