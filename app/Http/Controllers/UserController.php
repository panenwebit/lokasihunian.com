<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

use App\Models\Profile;
use App\Models\User;
use App\Models\Membership;
use App\Models\UserActivity;
use App\Models\UserFollowing;
use App\Models\StatusDelete;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

use BaconQrCode\Renderer\ImageRenderer;
use BaconQrCode\Renderer\Image\ImagickImageBackEnd;
use BaconQrCode\Renderer\RendererStyle\RendererStyle;
use BaconQrCode\Writer;

use Auth;

class UserController extends Controller
{
    public function afterLogin(){
        $user = User::find(auth()->user()->username);
        $user->last_login = date('Y-m-d H:i:s');
        $user->save();

        $activity = new UserActivity;
        $activity->do = 'Login';
        $activity->description = 'Login';
        $activity->route = '/login';
        $activity->username = auth()->user()->username;
        $activity->save();

        return redirect('/dashboard');
    }

    public function index(){
        UserActivity::create([
            'do'    => 'List-Users',
            'description'      => 'Mengakses halaman daftar pengguna',
            'route'        => '/dashboard/setting/users',
            'username'      => auth()->user()->username
        ]);

        $users = User::all();
        return view('dashboard.setting.users_list', ['users'=>$users]);
    }

    public function settingForm(){

        UserActivity::create([
            'do'    => 'Setting-Account',
            'description'      => 'Mengakses halaman pengaturan akun',
            'route'        => '/account/setting',
            'username'      => auth()->user()->username
        ]);

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

        UserActivity::create([
            'do'    => 'Update-Account-Password',
            'description'      => 'Memperbarui password dari akun '.auth()->user()->username,
            'route'        => '/account/setting',
            'username'      => auth()->user()->username
        ]);

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

        UserActivity::create([
            'do'    => 'Update-Account-Username',
            'description'      => 'Memperbarui username dari akun '.auth()->user()->username,
            'route'        => '/account/setting',
            'username'      => auth()->user()->username
        ]);

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

        UserActivity::create([
            'do'    => 'Setting-Users',
            'description'      => 'Memperbarui Role(peran) dari akun '.$request->username,
            'route'        => '/dashboard/setting/user_role/edit/'.$request->username,
            'username'      => auth()->user()->username
        ]);

        return redirect('dashboard/setting/users');
    }

    public function newInternForm(){
        return view('dashboard.setting.users.new_intern');
    }

    public function newIntern(Request $request){
        $request->validate([
            'username'  => ['required', 'string', 'max:255', 'unique:users'],
            'email'     => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password'  => ['required', 'confirmed'],
        ]);

        $user = new User;
        $user->username = strtolower($request->username);
        $user->email = strtolower($request->email);
        $user->password = Hash::make($request->password);
        $user->save();

        Profile::create([
            'username'          => strtolower($request->username),
            'fullname'          => '',
            'photo'             => asset('assets/img/agen/user_default.png'),
            'address'           => '',
            'handphone_number'  => '',
            'wa_number'         => '',
            'about_me'          => '',
            'address_location'  => '',
        ]);

        $role = array($request->role);
        $user->syncRoles([$role]);

        Membership::create([
            'username'   => strtolower($request->username),
            'package_id' => '1'
        ]);

        UserActivity::create([
            'do'    => 'Tambah-User-Intern',
            'description'      => 'Menambah user internal sebagai '.$request->role.' dari dengan username '.$request->username,
            'route'        => '/dashboard/setting/users/new_intern',
            'username'      => auth()->user()->username
        ]);

        return redirect('dashboard/setting/users');
    }

    public function toFollow($username, $r=false){
        $user = Auth::user();
        if(!$user){
            return 'login';
        }
        $following = UserFollowing::where('following', $username)->where('username', $user->username)->get();
        // dd($following);
        if(collect($following)->isEmpty()){
            $user_following = new UserFollowing;
            $user_following->username = $user->username;
            $user_following->following = $username;
            $user_following->save();

            UserActivity::create([
                'do'    => 'User-To-Follow',
                'description'      => 'Mulai mengikuti '.$username,
                'route'        => '/profile/toFollow/'.$username,
                'username'      =>auth()->user()->username
            ]);

            return 'added';
        } else {
            $following2 = UserFollowing::where('following', $username)->where('username', $user->username);
            $following2->delete();

            UserActivity::create([
                'do'    => 'User-To-Follow',
                'description'      => 'Berhenti mengikuti '.$username,
                'route'        => '/profile/toFollow/'.$username,
                'username'      =>auth()->user()->username
            ]);

            if($r){
                return back();
            }
            return 'removed';
        }
    }
}
