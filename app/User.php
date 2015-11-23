<?php

namespace App;

use Laravel\Cashier\Billable;
use Laravel\Spark\Teams\CanJoinTeams;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Laravel\Cashier\Contracts\Billable as BillableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Laravel\Spark\Auth\TwoFactor\Authenticatable as TwoFactorAuthenticatable;
use Laravel\Spark\Contracts\Auth\TwoFactor\Authenticatable as TwoFactorAuthenticatableContract;

class User extends Model implements AuthorizableContract,
    BillableContract,
    CanResetPasswordContract,
    TwoFactorAuthenticatableContract
{
    use Authorizable, Billable, CanResetPassword, TwoFactorAuthenticatable, FollowableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email',
        'name',
        'password',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'using_two_factor_auth'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'extra_billing_info',
        'last_four',
        'password',
        'remember_token',
        'stripe_id',
        'stripe_subscription',
        'two_factor_options',
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'subscription_ends_at',
        'trial_ends_at',
    ];

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

    public function notes(){
        return $this->hasMany('App\Models\Note');
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
