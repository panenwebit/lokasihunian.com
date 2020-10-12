<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Support\Facades\DB;

use App\Models\User;

class Profile extends Model
{
    use HasFactory, HasRoles;

    protected $table = 'profile';
    protected $keyType = 'string';
    public $incrementing = false;
    protected $primaryKey = 'username';
    protected $guard = 'web';

    protected $fillable = [
        'username',
        'fullname',
        'photo',
        'address',
        'address_location',
        'wa_number',
        'handphone_number',
        'about_me',
        'web_address',
        'fb_profile',
        'twitter_profile',
        'linkedin_profile',
        'ig_profile',
        'yt_profile',
        'company_name',
        'company_address',
        'company_location',
        'company_phone',
        'qr_code',
        'no_ktp',
        'no_npwp',
        'spesialis_area',
        'spesialis_property',
    ];

    public function user(){
        return $this->belongsTo('App\Models\User', 'username', 'username');
    }

    public function StatusDeleted(){
        return $this->hasOne('App\Models\Status_Delete', 'username', 'username');
    }

    public function addressLocation() {
        $kode = $this->spesialis_area;
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
