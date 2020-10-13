<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name',
        'price',
        'limit_listing',
        'limit_photo_per_listing',
        'limit_unggulan',
    ];

    public function member(){
        return $this->hasMany('App\Models\Membership', 'package_id', 'id');
    }

    public function StatusDeleted(){
        return $this->hasOne('App\Models\StatusDelete', 'table_id', 'id');
    }
}
