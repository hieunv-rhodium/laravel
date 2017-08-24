<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Http\AuthTraits\OwnsRecord;
use Illuminate\Support\Facades\Auth;

class User extends Authenticatable
{
    use Notifiable, OwnsRecord;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'is_subscribed' , 'password','is_admin','status_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * User has many widget
     */
    public function isAdmin()
    {
        return Auth::user()->is_admin == 1;
    }

    public function isActiveStatus()
    {
        return Auth::user()->status_id == 10;
    }

    public function widget()
    {
        return $this->hasMany('App\Widget');
    }

    public function categories()
    {
        return $this->hasMany('App\Categories');
    }

    public function product()
    {
        return $this->hasMany('App\Products');
    }

    public function socialProviders ()
    {
        return $this->hasMany('App\SocialProvider');
    }

}
