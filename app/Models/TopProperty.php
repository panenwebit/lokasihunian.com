<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TopProperty extends Model
{
    use HasFactory;

    protected $table = 'top_property';

    protected $fillable = [
        'property_id',
    ];
}
