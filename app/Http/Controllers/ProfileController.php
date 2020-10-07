<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Storage;
use App\Models\Profile;
use App\Models\User;

use BaconQrCode\Renderer\ImageRenderer;
use BaconQrCode\Renderer\Image\ImagickImageBackEnd;
use BaconQrCode\Renderer\RendererStyle\RendererStyle;
use BaconQrCode\Writer;

class ProfileController extends Controller
{
    public function show($username){
        $SQL = "SELECT 
                a.id, a.username, a.property_title, a.property_term, a.property_condition, a.property_type, a.property_price, a.property_surface_area, a.property_building_area, a.property_bedroom_count, a.property_bathroom_count, a.property_parking_count, a.property_slug, a.property_status,
                b.fullname, b.wa_number, b.photo,
                (SELECT c.images FROM property_images c WHERE c.property_id=a.id LIMIT 1) as images
                FROM property a 
                INNER JOIN `profile` b ON a.username = b.username ";
        if(isset($_GET['term']) || isset($_GET['condition']) || isset($_GET['type']) || isset($_GET['keyword']) || isset($_GET['lprice']) || isset($_GET['hprice']) ) {

            if(isset($_GET['term']) && $_GET['term']!='' && $_GET['term']!='all'){
                $term = $_GET['term'];
                $SQL .= "WHERE a.property_term='$term' ";
            } else {
                $SQL .= "WHERE 1=1 ";
            }

            if(isset($_GET['condition']) && $_GET['condition']!='' && $_GET['condition']!='all'){
                $condition = $_GET['condition'];
                $SQL .= "AND a.property_condition='$condition' ";
            }
    
            if(isset($_GET['type']) && $_GET['type']!='' && $_GET['type']!='all'){
                $type = $_GET['type'];
                $SQL .= "AND a.property_type='$type' ";
            }
    
            if(isset($_GET['keyword']) && $_GET['keyword']!=''){
                $keyword = $_GET['keyword'];
                $SQL .= "AND a.property_title LIKE '%$keyword%' OR a.property_description LIKE '%$keyword%' ";
            }

            if(isset($_GET['lprice']) || isset($_GET['hprice'])){
                $lprice = $_GET['lprice'];
                $hprice = $_GET['hprice'];
                
                if($_GET['lprice']!='all' && $_GET['hprice']!='all'){
                    if($hprice<$lprice){
                        $temp = $hprice;
                        $hprice = $lprice;
                        $lprice = $hprice;
                    }

                    $SQL .= "AND a.property_price BETWEEN '$lprice' AND '$hprice' ";
                } else if($_GET['lprice']=='all' && $_GET['hprice']!='all'){
                    $SQL .= "AND a.property_price < '$hprice' ";
                } else if($_GET['lprice']!='all' && $_GET['hprice']=='all'){
                    $SQL .= "AND a.property_price > '$lprice' ";
                } else {
                    $SQL .= "";
                }
            }   
        }
        $SQL .= " AND a.username='$username' AND a.property_status='Live' ";

        if(isset($_GET['sort']) && $_GET['sort']!='' && $_GET['sort']!='all'){
            $sort = $_GET['sort'];
            if($sort=='Baru'){
                $SQL .= " ORDER BY a.updated_at DESC ";
            } else if ($sort=='Murah'){
                $SQL .= " ORDER BY a.property_price ASC ";
            } else if ($sort=='Mahal'){
                $SQL .= " ORDER BY a.property_price DESC ";
            }
        }
        $result = DB::select($SQL);
        if((isset($_GET['page']) && $_GET['page']!='' && $_GET['page']!='all') || !isset($_GET['page'])){
            //paginator
            $hasPaginator = true;
            $property = collect($result); 
            $total = count($property);
            $currentPage = LengthAwarePaginator::resolveCurrentPage();
            $perPage = 6;
            $currentResults = $property->slice(($currentPage - 1) * $perPage, $perPage)->all();
            $results = new LengthAwarePaginator($currentResults, $property->count(), $perPage);
        } else {
            $hasPaginator = false;
            $results = $result;
        }

        $profile = Profile::findOrFail($username);
        return view('profiles.user_profile', ['profile'=>$profile, 'property'=>$results, 'hasPaginator'=>$hasPaginator]);
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
            'handphone_number' => ['required', 'numeric', 'unique:profile'],
            'wa_number' => ['required', 'numeric', 'unique:profile'],
        ]);

        $qr_path = 'images/qrcode/'.auth()->user()->username;
        if(!file_exists('storage/'.$qr_path)){
            Storage::makeDirectory('public/'.$qr_path);
        }

        $renderer = new ImageRenderer(
            new RendererStyle(400),
            new ImagickImageBackEnd()
        );
        $writer = new Writer($renderer);
        $writer->writeFile(url('profile').'/'.auth()->user()->username, 'storage/'.$qr_path.'/qrcode.png');

        $profile = Profile::find(auth()->user()->username);
        $profile->fullname          = $request->fullname;
        $profile->wa_number         = $request->wa_number;
        $profile->handphone_number         = $request->handphone_number;
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
        $profile->qr_code = 'storage/'.$qr_path.'qrcode.png';
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

    public function agenList(){
        $SQL = "SELECT 
                a.id, a.username, a.property_title, a.property_term, a.property_condition, a.property_type, a.property_price, a.property_surface_area, a.property_building_area, a.property_bedroom_count, a.property_bathroom_count, a.property_parking_count, a.property_slug, a.property_status,
                b.fullname, b.wa_number, b.photo,
                (SELECT c.images FROM property_images c WHERE c.property_id=a.id LIMIT 1) as images
                FROM property a 
                INNER JOIN `profile` b ON a.username = b.username ";
        if(isset($_GET['term']) || isset($_GET['condition']) || isset($_GET['type']) || isset($_GET['keyword']) || isset($_GET['lprice']) || isset($_GET['hprice']) ) {

            if(isset($_GET['term']) && $_GET['term']!='' && $_GET['term']!='all'){
                $term = $_GET['term'];
                $SQL .= "WHERE a.property_term='$term' ";
            } else {
                $SQL .= "WHERE 1=1 ";
            }

            if(isset($_GET['condition']) && $_GET['condition']!='' && $_GET['condition']!='all'){
                $condition = $_GET['condition'];
                $SQL .= "AND a.property_condition='$condition' ";
            }
    
            if(isset($_GET['type']) && $_GET['type']!='' && $_GET['type']!='all'){
                $type = $_GET['type'];
                $SQL .= "AND a.property_type='$type' ";
            }
    
            if(isset($_GET['keyword']) && $_GET['keyword']!=''){
                $keyword = $_GET['keyword'];
                $SQL .= "AND a.property_title LIKE '%$keyword%' OR a.property_description LIKE '%$keyword%' ";
            }

            if(isset($_GET['lprice']) || isset($_GET['hprice'])){
                $lprice = $_GET['lprice'];
                $hprice = $_GET['hprice'];
                
                if($_GET['lprice']!='all' && $_GET['hprice']!='all'){
                    if($hprice<$lprice){
                        $temp = $hprice;
                        $hprice = $lprice;
                        $lprice = $hprice;
                    }

                    $SQL .= "AND a.property_price BETWEEN '$lprice' AND '$hprice' ";
                } else if($_GET['lprice']=='all' && $_GET['hprice']!='all'){
                    $SQL .= "AND a.property_price < '$hprice' ";
                } else if($_GET['lprice']!='all' && $_GET['hprice']=='all'){
                    $SQL .= "AND a.property_price > '$lprice' ";
                } else {
                    $SQL .= "";
                }
            }   
        }
        $SQL .= " AND a.property_status='Live' ";

        if(isset($_GET['sort']) && $_GET['sort']!='' && $_GET['sort']!='all'){
            $sort = $_GET['sort'];
            if($sort=='Baru'){
                $SQL .= " ORDER BY a.updated_at DESC ";
            } else if ($sort=='Murah'){
                $SQL .= " ORDER BY a.property_price ASC ";
            } else if ($sort=='Mahal'){
                $SQL .= " ORDER BY a.property_price DESC ";
            }
        }
        $result = DB::select($SQL);
        if((isset($_GET['page']) && $_GET['page']!='' && $_GET['page']!='all') || !isset($_GET['page'])){
            //paginator
            $hasPaginator = true;
            $property = collect($result); 
            $total = count($property);
            $currentPage = LengthAwarePaginator::resolveCurrentPage();
            $perPage = 12;
            $currentResults = $property->slice(($currentPage - 1) * $perPage, $perPage)->all();
            $results = new LengthAwarePaginator($currentResults, $property->count(), $perPage);
        } else {
            $hasPaginator = false;
            $results = $result;
        }
        // dd($property);
        // dd($SQL);
        return view('property.list_property', ['property' => $results, 'hasPaginator'=>$hasPaginator]);
    }
}
