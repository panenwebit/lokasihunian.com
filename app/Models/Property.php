<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Property extends Model
{
    use HasFactory;

    protected $table = 'property';
    protected $guard = 'web';

    protected $fillable = [
        'username',
        'property_title',
        'property_description',
        'property_term',
        'property_conditon',
        'property_type',
        'property_price',
        'property_address',
        'property_latitude',
        'property_longitude',
        'property_provence',
        'property_city',
        'property_district',
        'property_surface_area',
        'property_building_area',
        'property_bedroom_count',
        'property_bathroom_count',
        'property_parking_count',
        'property_feature',
    ];

    public function user(){
        return $this->belongsTo('App\Models\User', 'username', 'username');
    }

    public function propertyImage(){
        return $this->hasMany('App\Models\PropertyImage', 'property_id', 'id');
    }

    public function propertyFavorites(){
        return $this->hasMany('App\Models\PropertyFavorite', 'property_id', 'id');
    }

    public function StatusDeleted(){
        return $this->hasOne('App\Models\StatusDelete', 'table_id', 'id');
    }

    public function propertyLocation() {
        $kode = $this->property_location;
        $kode_provinsi = substr($kode,0,2);
        $kode_kabupaten = substr($kode,0,5);
        $kode_kecamatan = substr($kode,0,8);
        $kode_kelurahan = substr($kode,0,13);
        $provinsi = DB::table('lokasi_indonesia')->where('tingkat', 'provinsi')->where('kode', 'LIKE', $kode_provinsi)->get();
        $kabupaten = DB::table('lokasi_indonesia')->where('tingkat', 'kabupaten')->where('kode', 'LIKE', $kode_kabupaten)->get();
        $kecamatan = DB::table('lokasi_indonesia')->where('tingkat', 'kecamatan')->where('kode', 'LIKE', $kode_kecamatan)->get();
        $kelurahan = DB::table('lokasi_indonesia')->where('tingkat', 'kelurahan')->where('kode', 'LIKE', $kode_kelurahan)->get();
        $wilayah = $provinsi[0]->wilayah.', '.$kabupaten[0]->wilayah.', '.$kecamatan[0]->wilayah.', '.$kelurahan[0]->wilayah;
        $wilayah2 = $kelurahan[0]->wilayah.', '.$kecamatan[0]->wilayah.', '.$kabupaten[0]->wilayah.', '.$provinsi[0]->wilayah;
        return $wilayah2;
    }
}
