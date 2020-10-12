<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Top_Location extends Model
{
    use HasFactory;
    
    protected $table = 'top_locations';

    protected $fillable = [
        'location_name',
        'location',
    ];
}
