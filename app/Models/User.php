<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasRoles, SoftDeletes;

    protected $keyType = 'string';
    public $incrementing = false;
    protected $primaryKey = 'username';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username',
        'email',
        'password',
        'provider',
        'provider_id',
        'last_login'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function profile() {
        return $this->hasOne('App\Models\Profile', 'username', 'username');
    }

    public function property() {
        return $this->hasMany('App\Models\Property', 'username', 'username');
    }

    public function propertyFavorites(){
        return $this->hasMany('App\Models\PropertyFavorite', 'username', 'username');
    }

    public function membership() {
        return $this->hasOne('App\Models\Membership', 'username', 'username');
    }

    public function followings() {
        return $this->hasMany('App\Models\UserFollowing', 'username', 'username');
    }

    public function followers() {
        return $this->hasMany('App\Models\UserFollowing', 'following', 'username');
    }
    
    public function StatusDeleted(){
        return $this->hasOne('App\Models\StatusDelete', 'username', 'username');
    }
}
