<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Membership extends Model
{
    use HasFactory;

    protected $fillable = [
        'username',
        'package_id',
    ];

    public function user(){
        return $this->belongsTo('App\Models\User', 'username', 'username');
    }

    public function package(){
        return $this->belongsTo('App\Models\Package', 'id', 'package_id');
    }
}
