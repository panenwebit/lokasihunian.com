<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserFollowing extends Model
{
    use HasFactory;
    protected $table='user_followings';

    protected $fillable = [
        'username',
        'following',
    ];

    public function follower(){
        return $this->belongsTo('App\Models\Profile', 'username', 'username');
    }

    public function following(){
        return $this->belongsTo('App\Models\Profile', 'username', 'following');
    }
}
