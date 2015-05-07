<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Link extends Model
{

	public $table = "links";

	public $primaryKey = "id";

	public $timestamps = true;

	public $fillable = [
	    "url",
		"name",
        "lesson_id",
        "text",
        "title",
        "canonicalUrl",
        "description",
        "image",
        "iframe"
	];

	public static $rules = [
	];

    public function iframe_id()
    {
        $re = "/id=([\",'])(.*?)\\g{1}/";
        $str = $this->iframe;
        preg_match($re, $str, $matches);

        return $matches[2];
    }

}
