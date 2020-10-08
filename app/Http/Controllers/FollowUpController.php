<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FollowUp;

class FollowUpController extends Controller
{
    public function index(){
        $follup = FollowUp::all();
        return view('dashboard.follow_up.index_follup', ['follup'=>$follup]);
    }

    public function myFollowUp(){
        $follup = FollowUp::where('admin_username','=', auth()->user()->username)->get();
        return view('dashboard.follow_up.my_follow_up', ['follup'=>$follup]);
    }

    public function create(){
        return view('dashboard.follow_up.create_follup');
    }

    public function store(Request $request){
        $request->validate([
            'email' => ['required', 'email', 'unique:users', 'unique:follow_ups'],
            'handphone_number' => ['required', 'numeric', 'unique:profile', 'unique:follow_ups'],
        ]);

        $follup = new FollowUp;
        $follup->name = $request->nama;
        $follup->email = $request->email;
        $follup->handphone_number = $request->handphone_number;
        $follup->information = $request->information;
        $follup->admin_username = auth()->user()->username;
        $follup->save();

        return redirect('dashboard');
    }
}
