<?php namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Laravel\Cashier\Billable;
use Laravel\Cashier\Contracts\Billable as BillableContract;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract, BillableContract {

	use Authenticatable, CanResetPassword, Billable, FollowableTrait;

    /**
     * The non standard date fields that should be converted to Carbon instances
     * @var array
     */
    protected $dates = ['trial_ends_at', 'subscription_ends_at'];

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['name', 'email', 'password'];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = ['password', 'remember_token'];

	/**
	 * User relationship with roles
	 *
	 *
	 */


	public function roles(){

		return $this->belongsToMany('App\Models\Role');

	}

    public function products(){

        return $this->belongsToMany('App\Models\Product')->withPivot('favorite', 'owner', 'mod');

    }

    public function lessons()
    {
        return $this->belongsToMany('App\Models\Lesson')->withPivot('score');
    }

	/**
     * Checks if the user has a Role by its name.
     *
     * @param string $name Role name.
     *
     * @return bool
     */
    public function hasRole($name)
    {
        foreach ($this->roles as $role) {
            if ($role->name == $name) {
                return true;
            }
        }

        return false;
    }

    public function followerCount()
    {
        $count = $this->followers()->count();

        return $count;
    }

    public function followsCount()
    {
        $count = $this->followedUsers()->count();

        return $count;
    }

    public function product_count()
    {
        $count = $this->products->count();

        return $count;
    }
    public function rating()
    {
        $count = $this->product_count();
        $total = 0;
        foreach($this->products as $product)
        {
            $total += $product->rating();
        }

        $rating = $total/$count;

        return $rating;
    }

    public function favorites_count()
    {
        $count = $this->products()->wherePivot('favorite', true)->count();

        return $count;

    }

    public function owned_count()
    {
        $count = $this->products()->wherePivot('owner', true)->count();

        return $count;

    }

}
