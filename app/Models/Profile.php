<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class Profile extends Model
{
    use HasFactory, HasRoles;

    protected $table = 'profile';
    protected $primaryKey = 'username';
    protected $guard = 'web';

    protected $fillable = [
        'username',
        'fullname',
        'photo',
        'address',
        'wa_number',
        'about_me',
        'web_address',
        'fb_profile',
        'twitter_profile',
        'ig_profile',
        'yt_profile',
        'company_name',
        'company_address',
        'company_phone',
    ];

    public function user(){
        return $this->belongsTo('App\Models\User', 'username', 'username');
    }
}
