<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\Models\Profile;
use App\Models\User;
use App\Models\UserActivity;
use App\Models\FollowUp;
use App\Models\StatusDelete;

use BaconQrCode\Renderer\ImageRenderer;
use BaconQrCode\Renderer\Image\ImagickImageBackEnd;
use BaconQrCode\Renderer\RendererStyle\RendererStyle;
use BaconQrCode\Writer;

class ProfileController extends Controller
{
    public function show($username){
        $profile = Profile::findOrFail($username);
        $user = Auth::user();

        if($user){
            UserActivity::create([
                'do'    => 'Lihat-Profile',
                'description'      => 'Melihat profile dari user '.$username,
                'route'        => '/profile/'.$username,
                'username'      =>auth()->user()->username
            ]);
        }

        
        if($profile->fullname==''){
            if($user && $username==auth()->user()->username){
                return redirect('profile/create');
            } else {
                abort(404);
            }
        }

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
        $isFollowing = false;
        foreach($profile->user->followers as $followers){
            if($followers->username==$user->username){
                $isFollowing = true;
            }
        }
        return view('profiles.user_profile', ['profile'=>$profile, 'property'=>$results, 'hasPaginator'=>$hasPaginator, 'isFollowing'=>$isFollowing]);
    }

    public function create(){
        $user = Auth::user();
        if($user->profile->fullname!=''){
            return redirect('dashboard');
        }
        return view('profiles.create_profile');
    }

    public function edit(){
        $profile = Profile::findOrFail(auth()->user()->username);
        return view('dashboard.profiles.edit_profile', ['profile'=> $profile]);
    }

    public function store(Request $request){
        // dd($request);

        $role = auth()->user()->getRoleNames()[0];
        if($role=='Agen Perusahaan' || $role=='Developer'){
            $request->validate([
                'no_ktp' => ['required', 'digits:16', 'unique:profile'],
                'no_npwp' => ['required', 'string', 'size:20', 'unique:profile'],
                'handphone_number' => ['required', 'digits_between:10,14', 'unique:profile'],
                'wa_number' => ['required', 'digits_between:10,14', 'unique:profile'],
                'address' => ['required'],
                'about_me' => ['required'],
                'company_name' => ['required'],
                'company_address' => ['required'],
                'company_phone' => ['required'],
            ]);
        } else {
            $request->validate([
                'no_ktp' => ['required', 'digits:16', 'unique:profile'],
                'handphone_number' => ['required', 'digits_between:10,14', 'unique:profile'],
                'wa_number' => ['required', 'digits_between:10,14', 'unique:profile'],
                'address' => ['required'],
            ]);
        }

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
        $profile->no_ktp            = $request->no_ktp;
        if($role=='Agen Perusahaan' || $role=='Developer'){
            $profile->no_npwp            = $request->no_npwp;
        }
        $profile->wa_number         = $request->wa_number;
        $profile->handphone_number  = $request->handphone_number;
        $profile->address           = $request->address;
        $profile->address_location  = $request->address_kelurahan;
        $profile->about_me          = $request->about_me;
        if($role=='Agen Perusahaan' || $role=='Developer'){
            $profile->company_name      = $request->company_name;
            $profile->company_address   = $request->company_address;
            $profile->company_location  = $request->company_kelurahan;
            $profile->company_phone     = $request->company_phone;
        }
        $profile->web_address         = $request->web_address;
        $profile->fb_profile          = $request->fb_profile;
        $profile->twitter_profile     = $request->twitter_profile;
        $profile->linkedin_profile    = $request->linkedin_profile;
        $profile->ig_profile          = $request->instagram_profile;
        $profile->yt_profile          = $request->youtube_profile;
        $profile->qr_code             = 'storage/'.$qr_path.'/qrcode.png';
        $profile->spesialis_property  = json_encode($request->spesialis_property);
        $profile->spesialis_area      = $request->spesialis_kelurahan;
        $profile->save();
        
        $FollowUp = FollowUp::where('handphone_number', $request->handphone_number)->orWhere('handphone_number', $request->wa_number)->where('handphone_registered', 'no')->get();
        if($FollowUp){
            $FollowUp = FollowUp::where('handphone_number', $request->handphone_number)->orWhere('handphone_number', $request->wa_number)->where('handphone_registered', 'no')
            ->update(['handphone_registered'=>'yes', 'updated_at'=>date('Y-m-d H:i:s')]);
        }

        UserActivity::create([
            'do'    => 'Create-Profile',
            'description'      => 'Membuat profile dari user '.auth()->user()->username,
            'route'        => '/profile/create',
            'username'      =>auth()->user()->username
        ]);
        
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

            UserActivity::create([
                'do'    => 'Update-Photo-Profile',
                'description'      => 'Memperbarui foto profile dari user '.auth()->user()->username,
                'route'        => '/profile/image',
                'username'      =>auth()->user()->username
            ]);
        }
        return back();
    }

    public function update(Request $request){
        $role = auth()->user()->getRoleNames()[0];
        if($role=='Agen Perusahaan' || $role=='Developer'){
            $request->validate([
                'no_ktp' => ['required', 'digits:16', 'unique:profile'],
                'no_npwp' => ['required', 'string', 'size:20', 'unique:profile'],
                'handphone_number' => ['required', 'digits_between:10,14', 'unique:profile'],
                'wa_number' => ['required', 'digits_between:10,14', 'unique:profile'],
                'address' => ['required'],
                'about_me' => ['required'],
                'company_name' => ['required'],
                'company_address' => ['required'],
                'company_phone' => ['required'],
            ]);
        } else {
            $request->validate([
                'no_ktp' => ['required', 'digits:16', 'unique:profile'],
                'handphone_number' => ['required', 'digits_between:10,14', 'unique:profile'],
                'wa_number' => ['required', 'digits_between:10,14', 'unique:profile'],
                'address' => ['required'],
            ]);
        }

        $profile = Profile::find(auth()->user()->username);
        $profile->fullname          = $request->fullname;
        $profile->no_ktp            = $request->no_ktp;
        if($role=='Agen Perusahaan' || $role=='Developer'){
            $profile->no_npwp            = $request->no_npwp;
        }
        $profile->wa_number         = $request->wa_number;
        $profile->handphone_number  = $request->handphone_number;
        $profile->address           = $request->address;
        $profile->address_location  = $request->address_kelurahan;
        $profile->about_me          = $request->about_me;
        if($role=='Agen Perusahaan' || $role=='Developer'){
            $profile->company_name      = $request->company_name;
            $profile->company_address   = $request->company_address;
            $profile->company_location  = $request->company_kelurahan;
            $profile->company_phone     = $request->company_phone;
        }
        $profile->web_address         = $request->web_address;
        $profile->fb_profile          = $request->fb_profile;
        $profile->twitter_profile     = $request->twitter_profile;
        $profile->linkedin_profile    = $request->linkedin_profile;
        $profile->ig_profile          = $request->instagram_profile;
        $profile->yt_profile          = $request->youtube_profile;
        $profile->spesialis_property  = json_encode($request->spesialis_property);
        $profile->spesialis_area      = $request->spesialis_kelurahan;
        $profile->save();

        UserActivity::create([
            'do'    => 'Edit-Profile',
            'description'      => 'Memperbarui profile dari user '.auth()->user()->username,
            'route'        => 'dashboard/profile/edit',
            'username'      =>auth()->user()->username
        ]);
        
        return redirect('dashboard');
    }

    public function agenList(){
        $user = Auth::user();

        if($user){
            UserActivity::create([
                'do'    => 'Agen-List',
                'description'      => 'Melihat daftar agen yang terdaftar pada lokasi hunian.',
                'route'        => '/agen',
                'username'      =>auth()->user()->username
            ]);
        }

        $SQL = "SELECT 
                a.username, a.fullname, a.wa_number, a.handphone_number, a.photo, a.company_name, a.company_location, a.web_address, a.fb_profile, a.twitter_profile, a.linkedin_profile, a.ig_profile, a.yt_profile, a.qr_code,
                d1.wilayah AS provinsi, d2.wilayah AS kota, d1.kode AS kode_provinsi, d2.kode AS kode_kota, 
                c.name AS roles
                FROM `profile` a 
                LEFT JOIN model_has_roles b ON a.username = b.model_username 
                LEFT JOIN roles c ON b.role_id = c.id
                LEFT JOIN lokasi_indonesia d1 ON SUBSTRING(a.spesialis_area, 1, 2) = d1.kode
                LEFT JOIN lokasi_indonesia d2 ON SUBSTRING(a.spesialis_area, 1, 5) = d2.kode ";

        $SQL .= " WHERE a.fullname!='' ";

        if(isset($_GET['keyword']) && $_GET['keyword']!=''){
            $keyword = $_GET['keyword'];
            $SQL .= " AND a.fullname LIKE '%$keyword%' AND d1.wilayah LIKE '%$keyword%' OR d2.wilayah LIKE '%$keyword%' ";
        }

        if(isset($_GET['location']) && $_GET['location']!=''){
            $location = $_GET['location'];
            $SQL .= " AND a.spesialis_area LIKE '$location%' AND d2.kode LIKE '%$location%' ";
        }

        $SQL .= " AND c.name LIKE 'Agen%'";

        if(isset($_GET['sort']) && $_GET['sort']!='' && $_GET['sort']!='all'){
            $sort = $_GET['sort'];
            if($sort=='Terbaru'){
                $SQL .= " ORDER BY a.updated_at DESC ";
            } else if ($sort=='AZ'){
                $SQL .= " ORDER BY a.fullname ASC ";
            } else if ($sort=='ZA'){
                $SQL .= " ORDER BY a.fullname DESC ";
            }
        }

        $result = DB::select($SQL);
        if((isset($_GET['page']) && $_GET['page']!='' && $_GET['page']!='all') || !isset($_GET['page'])){
            //paginator
            $hasPaginator = true;
            $profile = collect($result); 
            $total = count($profile);
            $currentPage = LengthAwarePaginator::resolveCurrentPage();
            $perPage = 12;
            $currentResults = $profile->slice(($currentPage - 1) * $perPage, $perPage)->all();
            $results = new LengthAwarePaginator($currentResults, $profile->count(), $perPage);
        } else {
            $hasPaginator = false;
            $results = $result;
        }
        // dd($profile);
        // dd($SQL);
        return view('profiles.list_agen', ['agen' => $results, 'hasPaginator'=>$hasPaginator]);
    }
}
