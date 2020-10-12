<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property_Favorite extends Model
{
    use HasFactory;

    protected $table = 'property_favorites';

    protected $fillable = [
        'username',
        'property_id'
    ];

    public function Property(){
        return $this->belongsToMany('App\Models\Property', 'id', 'property_id');
    }

    public function User(){
        return $this->belongsTo('App\Models\User', 'username', 'username');
    }
}
