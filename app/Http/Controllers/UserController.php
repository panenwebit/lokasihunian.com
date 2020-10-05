<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use app\Models\User;

use Auth;

class UserController extends Controller
{
    public function index(){
        $users = User::all();
        return view('dashboard.setting.users_list', ['users'=>$users]);
    }

    public function settingForm(){
        $user = User::find(auth()->user()->username);
        return view('user.form_setting', ['user' => $user]);
    }

    public function passwordUpdate(Request $request){
        $request->validate([
            'password_lama' => ['required', 'password'],
            'password_baru' => ['required', 'min:8'],
            'password_confirm' => ['required', 'same:password_baru'],
        ]);

        $user = User::find(auth()->user()->username);
        $user->password = Hash::make($request['password_baru']);
        $user->save();

        Auth::logout();
        return redirect('/login');
    }

    public function usernameUpdate(Request $request){
        $request->validate([
            'username' => ['required', 'max:255', 'unique:users'],
        ]);

        $user = User::find(auth()->user()->username);
        $user->username = $request->username;
        $user->save();

        return back();
    }
}
