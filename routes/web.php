<?php

use Illuminate\Support\Facades\Route;

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


Route::get('/property/{slug}', function () {
    return view('property.detail_property');
});

Route::get('/property', function () {
    return view('property.list_property');
});

Route::get('/profile/{username}', function () {
    return view('profiles.user_profile');
});

Route::get('/dashboard', function () {
    return view('dashboard.dashboard');
});

Route::get('/home', function () {
    return view('home');
})->middleware('auth');