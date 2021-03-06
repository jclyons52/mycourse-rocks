<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\URL;
use App\Libraries\Helpers\String;

class Post extends Model
{
    
	public $table = "posts";

	public $primaryKey = "id";
    
	public $timestamps = true;

	public $fillable = [
	    "user_id",
		"title",
		"slug",
		"content",
		"meta_title",
		"meta_description",
		"meta_keywords"
	];

	public static $rules = [
	];

    /**
     * Deletes a blog post and all
     * the associated comments.
     *
     * @return bool
     */
    public function delete()
    {
        // Delete the comments
        $this->comments()->delete();

        // Delete the blog post
        return parent::delete();
    }

    /**
     * Returns a formatted post content entry,
     * this ensures that line breaks are returned.
     *
     * @return string
     */
    public function content()
    {
        return nl2br($this->content);
    }

    /**
     * Get the post's author.
     *
     * @return User
     */
    public function author()
    {
        return $this->belongsTo('\App\User', 'user_id');
    }

    /**
     * Get the post's meta_description.
     *
     * @return string
     */
    public function meta_description()
    {
        return $this->meta_description;
    }

    /**
     * Get the post's meta_keywords.
     *
     * @return string
     */
    public function meta_keywords()
    {
        return $this->meta_keywords;
    }

    /**
     * Get the post's comments.
     *
     * @return array
     */
//    public function comments()
//    {
//        return $this->hasMany('\App\Models\Comment');
//    }

    /**
     * Get the date the post was created.
     *
     * @param \Carbon|null $date
     * @return string
     */
    public function date($date=null)
    {
        if(is_null($date)) {
            $date = $this->created_at;
        }

        return String::date($date);
    }

    /**
     * Get the URL to the post.
     *
     * @return string
     */
    public function url()
    {
        return Url::to('blog/'.$this->slug);
    }

    /**
     * Returns the date of the blog post creation,
     * on a good and more readable format :)
     *
     * @return string
     */
    public function created_at()
    {
        return $this->date($this->created_at);
    }

    /**
     * Returns the date of the blog post last update,
     * on a good and more readable format :)
     *
     * @return string
     */
    public function updated_at()
    {
        return $this->date($this->updated_at);
    }
}
