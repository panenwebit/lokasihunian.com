<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\FollowUpController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\MembershipController;

use BaconQrCode\Renderer\ImageRenderer;
use BaconQrCode\Renderer\Image\ImagickImageBackEnd;
use BaconQrCode\Renderer\RendererStyle\RendererStyle;
use BaconQrCode\Writer;

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

Route::get('/', [PublicController::class, 'root']);
Route::get('tentang_kami', function(){
    return view('lainnya.tentang_kami');
});
Route::get('hubungi_kami', function(){
    return view('lainnya.hubungi_kami');
});

Route::prefix('property')->group(function(){
    Route::get('/', [PropertyController::class, 'propertyList']);
    Route::get('/{slug}', [PropertyController::class, 'propertyDetail']);
});

Route::prefix('profile')->group(function(){

    Route::middleware(['auth', 'verified'])->get('/create', [ProfileController::class, 'create']);
    Route::middleware(['auth', 'verified'])->post('/', [ProfileController::class, 'store']);
    Route::middleware(['auth', 'verified'])->post('/image', [ProfileController::class, 'imageUpdate']);

    Route::get('/', [ProfileController::class, 'agenList']);
    Route::get('/{username}', [ProfileController::class, 'show']);
});

Route::prefix('agen')->group(function(){
    Route::get('/', [ProfileController::class, 'agenList']);
});

Route::prefix('account')->middleware(['auth', 'verified', 'profile_basic'])->group(function(){
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
        Route::get('user_role/edit/{username}', [UserController::class, 'editUserRole']);
        Route::patch('user_role', [UserController::class, 'updateUserRole']);

        Route::get('roles', [RoleController::class, 'index']);
        Route::get('role/edit/{name}', [RoleController::class, 'editRole']);
        Route::patch('role', [RoleController::class, 'updateRole']);
        Route::get('role_permission/edit/{name}', [RoleController::class, 'editRolePermission']);
        Route::patch('role_permission', [RoleController::class, 'updateRolePermission']);

        Route::get('permissions', [PermissionController::class, 'index']);
    });
    
    Route::prefix('property')->group(function(){
        Route::get('/listing', [PropertyController::class, 'index']);
        Route::get('/listing/create', [PropertyController::class, 'create']);
        Route::post('/listing', [PropertyController::class, 'store']);
        Route::post('/listing/images', [PropertyController::class, 'storeImages']);
        Route::get('/listing/edit/{id}', [PropertyController::class, 'edit']);
        Route::patch('/listing', [PropertyController::class, 'update']);
        
        Route::get('/my_listing/{status}', [PropertyController::class, 'myListing']);
        Route::get('/my_listing', [PropertyController::class, 'myListing']);
    });

    Route::prefix('profile')->group(function(){
        Route::get('/edit', [ProfileController::class, 'edit']);
        Route::patch('/', [ProfileController::class, 'update']);
    });

    Route::prefix('follow_up')->group(function(){
        Route::get('/create', [FollowUpController::class, 'create']);
        Route::post('/', [FollowUpController::class, 'store']);

        Route::get('/my/{status}', [FollowUpController::class, 'myFollowUp']);
        Route::get('/my', [FollowUpController::class, 'myFollowUp']);

        Route::get('/', [FollowUpController::class, 'index']);
    });

    Route::prefix('/package')->group(function () {

        Route::get('/', [PackageController::class, 'index']);
        Route::get('/create', [PackageController::class, 'create']);
        Route::post('/', [PackageController::class, 'store']);
        Route::get('/edit/{id}', [PackageController::class, 'edit']);
        Route::patch('/', [PackageController::class, 'update']);
        Route::get('/delete/{id}', [PackageController::class, 'delete']);
    });

    Route::prefix('/membership')->group(function () {

        Route::get('/', [MembershipController::class, 'show']);
    });

    Route::get('/bantu_daftar', [UserController::class, 'bantuDaftarForm']);
    Route::post('/bantu_daftar', [UserController::class, 'bantuDaftar']);
});

Route::get('test', function(){
    return "test";
});

Route::get('test_map', function() {
    return view('test.map');
});

Route::get('test_qr', function() {
    $text = 'BEGIN:VCARD VERSION:3.0 N:Alexandro;Jonathan FN:Jonathan Alexandro TEL;CELL:085104325155 EMAIL;WORK;INTERNET:yohannes@email.com END:VCARD';
    $renderer = new ImageRenderer(
        new RendererStyle(400),
        new ImagickImageBackEnd()
    );
    $writer = new Writer($renderer);
    $writer->writeFile($text, 'qrcode.png');
});

Route::get('test_role', [RoleController::class, 'testRole']);