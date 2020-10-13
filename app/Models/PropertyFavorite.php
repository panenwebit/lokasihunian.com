<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PropertyFavorite extends Model
{
    use HasFactory;

    protected $table = 'property_favorites';

    protected $fillable = [
        'username',
        'property_id'
    ];
}
