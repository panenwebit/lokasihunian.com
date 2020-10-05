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
    Route::middleware(['auth', 'verified'])->get('/create', [ProfileController::class, 'create']);
    Route::middleware(['auth', 'verified'])->get('/edit', [ProfileController::class, 'edit']);
    Route::middleware(['auth', 'verified'])->post('/', [ProfileController::class, 'store']);
    Route::middleware(['auth', 'verified'])->patch('/', [ProfileController::class, 'update']);
    Route::middleware(['auth', 'verified'])->post('/image', [ProfileController::class, 'imageUpdate']);

    Route::get('/{username}', [ProfileController::class, 'show']);
});

Route::prefix('account')->middleware(['auth', 'verified'])->group(function(){
    Route::get('/setting', [UserController::class, 'settingForm']);
    Route::patch('/password', [UserController::class, 'passwordUpdate']);
    Route::patch('/username', [UserController::class, 'usernameUpdate']);
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

Route::get('test_map', function() {
    return view('test.map');
});