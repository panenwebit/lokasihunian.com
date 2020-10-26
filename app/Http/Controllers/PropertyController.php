<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Auth;

use App\Models\Property;
use App\Models\PropertyImage;
use App\Models\PropertyFavorite;
use App\Models\UserActivity;
use App\Models\StatusDelete;
use App\Models\User;
use App\Models\Package;
use App\Models\Membership;

class PropertyController extends Controller
{
    public function index(){
        UserActivity::create([
            'do'    => 'Index-Property',
            'description'      => 'Melihat list seluruh property yang ada di lokasi hunian',
            'route'        => '/dashboard/property/listing',
            'username'      =>auth()->user()->username
        ]);

        $property = Property::all();
        return view('dashboard.property.property_all', ['property'=>$property]);
    }

    public function create(){
        $package = Package::find(auth()->user()->membership->package_id);
        return view('dashboard.property.create_property', ['package' => $package]);
    }
    
    public function store(Request $request){
        $request->validate([
            'property_title' => ['required', 'unique:property'],
            'property_price' => ['required'],
            'property_surface_area' => ['required'],
            'property_building_area' => ['required'],
            'property_bedroom_count' => ['required'],
            'property_bathroom_count' => ['required'],
            'property_parking_count' => ['required'],
            'property_address' => ['required'],
            'property_description' => ['required'],
        ]);

        $property                           = new Property;
        $property->username                 = auth()->user()->username;
        $property->property_title           = $request->property_title;
        $property->property_type            = $request->property_type;
        $property->property_term            = $request->property_term;
        $property->property_condition       = $request->property_condition;
        $property->property_price           = $request->property_price;
        $property->property_surface_area    = $request->property_surface_area;
        $property->property_building_area   = $request->property_building_area;
        $property->property_bedroom_count   = $request->property_bedroom_count;
        $property->property_bathroom_count  = $request->property_bathroom_count;
        $property->property_parking_count   = $request->property_parking_count;
        $property->property_address         = $request->property_address;
        $property->property_location        = $request->property_kelurahan;
        $property->property_description     = $request->property_description;
        $property->property_slug            = Str::slug($request->property_title, '_');
        $property->property_status          = 'Live';
        $property->save();

        if(count($request->property_image)>1){
            for($i=0;$i<count($request->property_image)+1;$i++){
                if($i>0){
                    $images = $request->file('property_image');
                    $image = $images[$i];
                    $image_path = $image->store('images/property/'.auth()->user()->username.'/'.date('Y').'/'.date('m').'/'.date('d').'/'.$property->id, 'public');
                    $watermark = Image::make(public_path('assets/img/logo/wmark_sm_180.png'));
                    $image_fit = Image::make(public_path('storage/'.$image_path))->fit(900, 675);
                    $image_fit->insert($watermark, 'center');
                    $image_fit->save();
                    $path = 'storage/'.$image_path;

                    $property_image = new PropertyImage;
                    $property_image->property_id = $property->id;
                    $property_image->images = $path;
                    $property_image->save();
                }
            }
        } else {

        }

        UserActivity::create([
            'do'    => 'Tambah-Property',
            'description'      => 'Menambahkan property baru',
            'route'        => '/dashboard/property/listing/create',
            'username'      =>auth()->user()->username
        ]);

        return redirect('dashboard');
        // return back();
    }

    public function update(Request $request){
        $request->validate([
            'property_title' => ['required', 'unique:property'],
            'property_price' => ['required'],
            'property_surface_area' => ['required'],
            'property_building_area' => ['required'],
            'property_bedroom_count' => ['required'],
            'property_bathroom_count' => ['required'],
            'property_parking_count' => ['required'],
            'property_address' => ['required'],
            'property_description' => ['required'],
        ]);
        
        $property                           = Property::find($request->id);
        $property->username                 = auth()->user()->username;
        $property->property_title           = $request->property_title;
        $property->property_type            = $request->property_type;
        $property->property_term            = $request->property_term;
        $property->property_condition       = $request->property_condition;
        $property->property_price           = $request->property_price;
        $property->property_surface_area    = $request->property_surface_area;
        $property->property_building_area   = $request->property_building_area;
        $property->property_bedroom_count   = $request->property_bedroom_count;
        $property->property_bathroom_count  = $request->property_bathroom_count;
        $property->property_parking_count   = $request->property_parking_count;
        $property->property_address         = $request->property_address;
        $property->property_location        = $request->property_kelurahan;
        $property->property_description     = $request->property_description;
        $property->property_slug            = Str::slug($request->property_title, '_');
        $property->property_status          = 'Live';
        $property->save();

        UserActivity::create([
            'do'    => 'Update-Property',
            'description'      => 'Memperbarui property dengan id '.$request->id,
            'route'        => '/dashboard/property/listing/edit/'.$request->id,
            'username'      =>auth()->user()->username
        ]);

        return redirect('dashboard');
    }

    public function edit($id){
        $property = Property::find($id);
        return view('dashboard.property.edit_property', ['property'=>$property]);
    }

    // public function storeImages(Request $request){
    //     // $property = new PropertyImage;
    //     $image = $request->file('file');
    //     $image_path = $image->store('images/property/'.auth()->user()->username.'/'.date('Y').'/'.date('m').'/'.date('d'), 'public');
    //     $watermark = Image::make(public_path('assets/img/logo/wmark_sm_180.png'));
    //     $image_fit = Image::make(public_path('storage/'.$image_path))->fit(900, 675);
    //     $image_fit->insert($watermark, 'center');
    //     $image_fit->save();

    //     return 'storage/'.$image_path;
    // }

    public function propertyList(){
        $user = Auth::user();
        if($user){
            UserActivity::create([
                'do'    => 'Property-List',
                'description'      => 'Melihat berbagai macam property yang live.',
                'route'        => '/property',
                'username'      =>auth()->user()->username
            ]);
        }

        $SQL = "SELECT 
                a.id, a.username, a.property_title, a.property_term, a.property_condition, a.property_type, a.property_price, a.property_surface_area, a.property_building_area, a.property_bedroom_count, a.property_bathroom_count, a.property_parking_count, a.property_slug, a.property_status,
                b.fullname, b.wa_number, b.photo,
                d1.wilayah AS provinsi, d2.wilayah AS kota, d1.kode AS kode_provinsi, d2.kode AS kode_kota, 
                (SELECT c.images FROM Property_Images c WHERE c.property_id=a.id LIMIT 1) as images
                FROM property a 
                INNER JOIN `profile` b ON a.username = b.username 
                INNER JOIN lokasi_indonesia d1 ON SUBSTRING(a.property_location,1,2) = d1.kode 
                INNER JOIN lokasi_indonesia d2 ON SUBSTRING(a.property_location,1,5) = d2.kode ";
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
                $SQL .= "AND a.property_title LIKE '%$keyword%' OR a.property_description LIKE '%$keyword%' OR d1.wilayah LIKE '%$keyword%' OR d2.wilayah LIKE '%$keyword%' ";
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

        if(isset($_GET['location']) && $_GET['location']!=''){
            $location = $_GET['location'];
            $SQL .= " AND a.property_location LIKE '$location%' OR d2.kode LIKE '%$location%' ";
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
            $perPage = 9;
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

    public function propertyDetail($slug){
        $user = Auth::user();

        if($user){
            UserActivity::create([
                'do'    => 'Detail-Property',
                'description'      => 'Melihat detail dari propery dengan url '.$slug,
                'route'        => '/property/'.$slug,
                'username'      =>auth()->user()->username
            ]);
        }

        $property = Property::where('property_slug', $slug)->firstOrFail();
        $isFavorite = false;
        $user = Auth::user();
        if($user){
            foreach(auth()->user()->propertyFavorites as $userFavorite){
                if($userFavorite->property_id == $property->id){
                    $isFavorite=true;
                } else {
                    $isFavorite=false;
                }
            }
        }
        return view('property.detail_property', ['property'=>$property, 'isFavorite'=>$isFavorite]);
    }

    public function myListing($status=false){
        if($status){
            UserActivity::create([
                'do'    => 'Listing-Saya',
                'description'      => 'Melihat property yang user tambahkan dengan status '.$status,
                'route'        => '/dashboard/property/my_listing/'.$status,
                'username'      =>auth()->user()->username
            ]);

            $property = Property::where('username', auth()->user()->username)->where('property_status', $status)->get();
        } else {
            UserActivity::create([
                'do'    => 'Listing-Saya',
                'description'      => 'Melihat semua property yang user tambahkan',
                'route'        => '/dashboard/property/my_listing',
                'username'      =>auth()->user()->username
            ]);

            $property = Property::where('username', auth()->user()->username)->get();
        }
        return view('dashboard.property.my_listing', ['property'=> $property, 'status'=>$status]);
    }

    public function archive($id){
        $property = Property::find($id);
        $property->property_status = 'Archived';
        $property->save();

        UserActivity::create([
            'do'    => 'Archive-Property',
            'description'      => 'Mengarsipkan property dengan ID '.$id,
            'route'        => '/dashboard/property/archive/'.$id,
            'username'      =>auth()->user()->username
        ]);
        
        return back();
    }

    public function live($id){
        $property = Property::find($id);
        $property->property_status = 'Live';
        $property->save();

        UserActivity::create([
            'do'    => 'Live-Property',
            'description'      => 'Menayangkan kembali property dengan ID '.$id,
            'route'        => '/dashboard/property/listing/live/'.$id,
            'username'      =>auth()->user()->username
        ]);
        
        return back();
    }

    public function myFavorite(){
        UserActivity::create([
            'do'    => 'List-Property-Favorite',
            'description'      => 'Melihat daftar property yang saya favoritkan',
            'route'        => '/dashboard/property/my_favorite',
            'username'      =>auth()->user()->username
        ]);

        $user = Auth::user();
        $SQL = "SELECT a.username, b.property_title, b.property_type, b.property_condition, b.property_term, b.property_status, b.property_slug, b.id
                FROM property_favorites a INNER JOIN property b ON b.id = a.property_id 
                WHERE a.username='$user->username'";
        $property = DB::select($SQL);
        return view('dashboard.property.my_favorite', ['property'=> $property]);
    }

    public function toFavorites(Request $request, $id, $r=false){
        $user = Auth::user();
        if(!$user){
            return 'login';
        }
        $favorite = PropertyFavorite::where('property_id', $id)->where('username', $user->username)->get();
        // dd($favorite);
        if(collect($favorite)->isEmpty()){
            $property_favorite = new PropertyFavorite;
            $property_favorite->username = $user->username;
            $property_favorite->property_id = $id;
            $property_favorite->save();

            UserActivity::create([
                'do'    => 'Property-To-Favorite',
                'description'      => 'Menambah property dengan ID '.$id.' ke daftar favorit',
                'route'        => '/property/toFavorites/'.$id,
                'username'      =>auth()->user()->username
            ]);

            return 'added';
        } else {
            $favorite2 = PropertyFavorite::where('property_id', $id)->where('username', $user->username);
            $favorite2->delete();

            UserActivity::create([
                'do'    => 'Property-To-Favorite',
                'description'      => 'Menghapus property dengan ID '.$id.' dari daftar favorit',
                'route'        => '/property/toFavorites/'.$id,
                'username'      =>auth()->user()->username
            ]);

            if($r){
                return back();
            }
            return 'removed';
        }
    }
}
