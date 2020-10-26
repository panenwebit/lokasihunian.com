<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FollowUp extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'role',
        'handphone_number',
        'email',
        'information',
        'handphone_registered',
        'email_registered',
        'admin_username',
    ];

    public function admin(){
        return $this->belongsTo('App\Models\Users', 'username', 'admin_username');
    }

    public function StatusDeleted(){
        return $this->hasOne('App\Models\StatusDelete', 'table_id', 'id');
    }
}
