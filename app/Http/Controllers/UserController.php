<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use App\Models\Profile;
use app\Models\User;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

use BaconQrCode\Renderer\ImageRenderer;
use BaconQrCode\Renderer\Image\ImagickImageBackEnd;
use BaconQrCode\Renderer\RendererStyle\RendererStyle;
use BaconQrCode\Writer;

use Auth;

class UserController extends Controller
{
    public function index(){
        $users = User::all();
        return view('dashboard.setting.users_list', ['users'=>$users]);
    }

    public function settingForm(){
        $user = User::find(auth()->user()->username);
        return view('dashboard.user.form_setting', ['user' => $user]);
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

        $qr_path = 'images/qrcode/'.$request->username;
        if(!file_exists('storage/'.$qr_path)){
            Storage::makeDirectory('public/'.$qr_path);
        }

        $renderer = new ImageRenderer(
            new RendererStyle(400),
            new ImagickImageBackEnd()
        );
        $writer = new Writer($renderer);
        $writer->writeFile(url('profile').'/'.$request->username, 'storage/'.$qr_path.'/qrcode.png');

        $user = User::find(auth()->user()->username);
        $user->username = $request->username;
        $user->save();

        $profile = Profile::find($request->username);
        $profile->qr_code = 'storage/'.$qr_path.'/qrcode.png';
        $profile->save();

        return back();
    }

    public function bantuDaftarForm(){
        return view('dashboard.user.form_bantu_daftar');
    }

    public function bantuDaftar(Request $request){
        return $request;
    }

    public function editUserRole($username){
        $roles = Role::all();
        $user = User::findOrFail($username);
        return view('dashboard.setting.edit_user_role', ['roles'=>$roles, 'user'=>$user]);
    }

    public function updateUserRole(Request $request){
        $user = User::find($request->username);
        $user->syncRoles([$request->role]);
        return redirect('dashboard/setting/users');
    }
}
