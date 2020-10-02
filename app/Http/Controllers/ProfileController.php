<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profile;

class ProfileController extends Controller
{
    public function create(Request $request){
        // dd($request);
        $profile = Profile::find(auth()->user()->username);
        $profile->fullname          = $request->fullname;
        $profile->wa_number         = $request->wa_number;
        $profile->address           = $request->address;
        $profile->address_location  = $request->address_kelurahan;
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

    public function show($username){
        $profile = Profile::findOrFail($username);
        return view('profiles.user_profile', ['profile'=>$profile]);
    }
}
