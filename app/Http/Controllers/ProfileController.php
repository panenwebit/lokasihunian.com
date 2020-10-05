<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use App\Models\Profile;
use App\Models\User;

class ProfileController extends Controller
{
    public function show($username){
        $profile = Profile::findOrFail($username);
        return view('profiles.user_profile', ['profile'=>$profile]);
    }

    public function create(){
        return view('profiles.create_profile');
    }

    public function edit(){
        $profile = Profile::findOrFail(auth()->user()->username);
        return view('profiles.edit_profile', ['profile'=> $profile]);
    }

    public function store(Request $request){
        // dd($request);

        $request->validate([
            'wa_number' => ['required', 'string', 'max:255', 'unique:profile'],
        ]);

        $profile = Profile::find(auth()->user()->username);
        $profile->fullname          = $request->fullname;
        $profile->wa_number         = $request->wa_number;
        // $profile->address           = $request->address;
        // $profile->address_location  = $request->address_kelurahan;
        $profile->about_me          = $request->about_me;
        $profile->company_name      = $request->company_name;
        $profile->company_address   = $request->company_address;
        $profile->company_location  = $request->company_kelurahan;
        $profile->company_phone     = $request->company_phone;
        $profile->web_address       = $request->web_address;
        $profile->fb_profile        = $request->fb_profile;
        $profile->twitter_profile   = $request->twitter_profile;
        $profile->linkedin_profile  = $request->linkedin_profile;
        $profile->ig_profile = $request->instagram_profile;
        $profile->yt_profile   = $request->youtube_profile;
        $profile->save();
        
        return redirect('dashboard');
    }

    public function imageUpdate(Request $request){
        if ($request->hasFile('image_profile')) {
            $image = $request->file('image_profile');
            $image_path = $image->store('images/profiles/'.auth()->user()->username.'', 'public');
            $image_squared = Image::make(public_path('storage/'.$image_path))->fit(500, 500);
            $image_squared->save();

            $profile = Profile::find(auth()->user()->username);
            $profile->photo = url('storage/'.$image_path);
            $profile->save();
        }
        return back();
    }

    public function update(Request $request){
        // $request->validate([
        //     'wa_number' => ['required', 'string', 'max:255', 'unique:profile'],
        // ]);

        $profile = Profile::find(auth()->user()->username);
        $profile->fullname          = $request->fullname;
        $profile->wa_number         = $request->wa_number;
        // $profile->address           = $request->address;
        // $profile->address_location  = $request->address_kelurahan;
        $profile->about_me          = $request->about_me;
        if($request->company_name){
            $profile->company_name      = $request->company_name;
            $profile->company_address   = $request->company_address;
            $profile->company_location  = $request->company_kelurahan;
            $profile->company_phone     = $request->company_phone;
        }
        $profile->web_address       = $request->web_address;
        $profile->fb_profile        = $request->fb_profile;
        $profile->twitter_profile   = $request->twitter_profile;
        $profile->linkedin_profile  = $request->linkedin_profile;
        $profile->ig_profile = $request->instagram_profile;
        $profile->yt_profile   = $request->youtube_profile;
        $profile->save();
        
        return redirect('dashboard');
    }
}
