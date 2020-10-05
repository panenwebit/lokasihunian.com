<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\Property;

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
        $property->property_status          = 'Pending';
        $property->save();

        return redirect('dashboard');
    }

    public function propertyList(){
        return view('property.list_property');
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
