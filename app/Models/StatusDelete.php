<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StatusDelete extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'status_delete';

    protected $fillable = [
        'table_name',
        'table_id',
        'status',
        'username',
        'created_at',
        'updateded_at',
    ];

    public function FollowUp(){
        return $this->hasMany('App\Models\FollowUp', 'id', 'table_id');
    }

    public function Property(){
        return $this->hasMany('App\Models\Property', 'id', 'table_id');
    }

    public function User(){
        return $this->hasMany('App\Models\User', 'username', 'username');
    }

    Public function Package(){
        return $this->hasMany('App\Models\Package', 'id', 'table_id');
    }
}
