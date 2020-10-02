<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('lokasi')->group(function(){
   
    Route::get('/decode', function (Request $request) {
        $kode = $request->kode;
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
    });

    Route::get('/indonesia', function (Request $request) {
        $kode = $request->kode;
        $provinsi = DB::table('lokasi_indonesia')->where('kode', 'LIKE', $kode)->get();
        return $provinsi;
    });

    Route::get('/provinsi', function (Request $request) {
        $provinsi = DB::table('lokasi_indonesia')->where('tingkat', 'provinsi')->get();
        return $provinsi;
    });
    
    Route::get('/kabupaten', function (Request $request) {
        $provinsi = $request->provinsi;
        $kabupaten = DB::table('lokasi_indonesia')->where('tingkat', 'kabupaten')->where('kode', 'LIKE', $provinsi.'.%')->get();
        return $kabupaten;
    });
    
    Route::get('/kecamatan', function (Request $request) {
        $kabupaten = $request->kabupaten;
        $kecamatan = DB::table('lokasi_indonesia')->where('tingkat', 'kecamatan')->where('kode', 'LIKE', $kabupaten.'.%')->get();
        return $kecamatan;
    });
    
    Route::get('/kelurahan', function (Request $request) {
        $kecamatan = $request->kecamatan;
        $kelurahan = DB::table('lokasi_indonesia')->where('tingkat', 'kelurahan')->where('kode', 'LIKE', $kecamatan.'.%')->get();
        return $kelurahan;
    });
});