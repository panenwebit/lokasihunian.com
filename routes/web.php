<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PermissionController;

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

    Route::get('/{slug}', function () {
        return view('property.detail_property');
    });
});

Route::prefix('profile')->group(function(){
    Route::get('/', function () {
        return view('profiles.list_profile');
    });

    Route::get('/{slug}', function () {
        return view('profiles.user_profile');
    });

    Route::get('/{slug}/create', function () {
        return view('profiles.create_profile');
    });
});


Route::get('/profile/{username}', function () {
    return view('profiles.user_profile');
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