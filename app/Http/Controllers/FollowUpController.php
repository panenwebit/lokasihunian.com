<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FollowUp;
use App\Models\UserActivity;
use App\Models\StatusDelete;

class FollowUpController extends Controller
{
    public function index(){
        UserActivity::create([
            'do'    => 'Data-Follow-UP',
            'description'      => 'Lihat Data Follow Up',
            'route'        => '/dashboard/follow_up',
            'username'      =>auth()->user()->username
        ]);

        $follup = FollowUp::all();
        return view('dashboard.follow_up.index_follup', ['follup'=>$follup]);
    }

    public function myFollowUp(){
        UserActivity::create([
            'do'    => 'Follow-UP-Saya',
            'description'      => 'Lihat Data Follow Up yang telah user lakukan',
            'route'        => '/dashboard/follow_up/my',
            'username'      =>auth()->user()->username
        ]);

        $follup = FollowUp::where('admin_username','=', auth()->user()->username)->get();
        return view('dashboard.follow_up.my_follow_up', ['follup'=>$follup]);
    }

    public function create(){
        return view('dashboard.follow_up.create_follup');
    }

    public function store(Request $request){
        $request->validate([
            'name' => ['required', 'string'],
            'email' => ['required', 'email', 'unique:users', 'unique:follow_ups'],
            'handphone_number' => ['required', 'digits_between:10,14', 'unique:profile', 'unique:follow_ups'],
            'information' => ['required', 'string'],
        ]);

        $follup = new FollowUp;
        $follup->name = $request->name;
        $follup->email = $request->email;
        $follup->handphone_number = $request->handphone_number;
        $follup->information = $request->information;
        $follup->admin_username = auth()->user()->username;
        $follup->save();

        UserActivity::create([
            'do'    => 'Input-Follow-UP',
            'description'      => 'Menambahkan data follow up',
            'route'        => '/dashboard/follow_up/create',
            'username'      =>auth()->user()->username
        ]);

        return redirect('dashboard');
    }
}
