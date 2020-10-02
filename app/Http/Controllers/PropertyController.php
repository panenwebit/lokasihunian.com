<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Property;

class PropertyController extends Controller
{
    public function create(Request $request){
        $property = new Property;
        $property->property_title = $request->property_title;
        $property->property_description = $request->property_description;
        $property->property_price = $request->property_price;
        $property->property_term = $request->property_term;
        $property->property_condition = $request->property_condition;
        $property->property_type = $request->property_type;
        $property->property_address = $request->property_address;
        $property->property_location = $request->property_location;
        $property->property_surface_area = $request->property_surface_area;
        $property->property_building_area = $request->property_building_area;
        $property->property_bedroom_count = $request->property_bedroom_count;
        $property->property_bathroom_count = $request->property_bathroom_count;
        $property->property_parking_count = $request->property_parking_count;
        // // $property->property_feature = $request->property_feature;
        $property->save();

        return redirect('dashboard');
    }
}
