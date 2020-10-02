<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property_Image extends Model
{
    use HasFactory;

    protected $table = 'property_images';
    protected $guard = 'web';

    protected $fillable = [
        'property_id',
        'images',
    ];

    public function property(){
        return $this->belongsTo('App\Models\Property', 'property_id', 'id');
    }
}
