<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;

    protected $table = 'property';
    protected $guard = 'web';

    public function user(){
        return $this->belongsTo('App\Models\User', 'username', 'username');
    }
}
