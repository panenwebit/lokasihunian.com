<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PropertyController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('auth/{provider}', 'App\Http\Controllers\Auth\LoginController@redirectToProvider');
Route::get('auth/{provider}/callback', 'App\Http\Controllers\Auth\LoginController@handleProviderCallback');

Route::get('/', function () {
    return view('welcome');
});
Route::get('tentang_kami', function(){
    return view('lainnya.tentang_kami');
});
Route::get('hubungi_kami', function(){
    return view('lainnya.hubungi_kami');
});

Route::prefix('property')->group(function(){
    Route::get('/', function () {
        return view('property.list_property');
    });

    Route::get('/buat_listing', function () {
        return view('property.create_property');
    });
    Route::post('/buat_listing', [PropertyController::class, 'create']);

    Route::get('/{slug}', function () {
        return view('property.detail_property');
    });
});

Route::prefix('profile')->group(function(){
    Route::get('/', function () {
        return view('profiles.list_profile');
    });

    Route::get('/{username}', [ProfileController::class, 'show']);

    Route::middleware(['auth', 'verified'])->get('/{username}/create', function () {
        return view('profiles.create_profile');
    });
    Route::middleware(['auth', 'verified'])->post('/{username}/create', [ProfileController::class, 'create']);
});

Route::prefix('dashboard')->middleware(['auth', 'verified', 'profile_basic'])->group(function () {

    Route::get('/', function() {
        return view('dashboard.dashboard');
    });

    Route::prefix('/setting')->group(function () {
        Route::get('users', [UserController::class, 'index']);
        Route::get('roles', [RoleController::class, 'index']);
        Route::get('permissions', [PermissionController::class, 'index']);
    });
});

Route::get('test', function() {
    return 'test';
});

Route::get('test_map', function() {
    return view('test.map');
});