<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use Intervention\Image\Facades\Image;

use App\Models\Property;
use App\Models\Property_Image;

class PropertyController extends Controller
{
    public function index(){
        $property = Property::all();
        return view('dashboard.property.property_all', ['property'=>$property]);
    }

    public function create(){
        return view('dashboard.property.create_property');
    }
    
    public function store(Request $request){
        $request->validate([
            'property_title' => ['required', 'unique:property'],
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
        // $property->property_feature      = $request->property_feature;
        $property->property_slug            = Str::slug($request->property_title, '_');
        $property->property_status          = 'Live';
        $property->save();

        return redirect('dashboard');
    }

    public function update(Request $request){
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
        // $property->property_feature      = $request->property_feature;
        $property->property_slug            = Str::slug($request->property_title, '_');
        $property->property_status          = 'Live';
        $property->save();

        return redirect('dashboard');
    }

    public function edit($id){
        $property = Property::find($id);
        return view('dashboard.property.edit_property', ['property'=>$property]);
    }

    public function storeImages(Request $request){
        // $property = new Property_Image;
        $image = $request->file('file');
        $image_path = $image->store('images/property/'.auth()->user()->username.'/'.date('Y').'/'.date('m').'/'.date('d'), 'public');
        $watermark = Image::make(public_path('assets/img/logo/wmark_sm_180.png'));
        $image_fit = Image::make(public_path('storage/'.$image_path))->fit(900, 675);
        $image_fit->insert($watermark, 'center');
        $image_fit->save();

        return 'storage/'.$image_path;
    }

    public function propertyList(){
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
        $property = Property::where('property_slug', $slug)->firstOrFail();
        return view('property.detail_property', ['property'=>$property]);
    }

    public function myListing($status=false){
        if($status){
            $property = Property::where('username', auth()->user()->username)->where('property_status', $status)->get();
        } else {
            $property = Property::where('username', auth()->user()->username)->get();
        }
        return view('dashboard.property.my_listing', ['property'=> $property, 'status'=>$status]);
    }
}
