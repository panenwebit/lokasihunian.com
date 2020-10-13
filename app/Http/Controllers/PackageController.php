<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

use App\Models\Package;
use App\Models\Membership;
use App\Models\StatusDelete;

class PackageController extends Controller
{
    public function index(){
        $packages = Package::all();
        // dd($packages);
        return view('dashboard.package.package', ['packages'=>$packages]);
    }

    public function create(){
        return view('dashboard.package.create_package');
    }

    public function store(Request $request){
        $package = new Package;
        $package->name                      = Str::upper($request->nama_paket);
        $package->price                     = $request->harga_paket;
        $package->limit_listing             = $request->limit_listing;
        $package->limit_unggulan            = $request->limit_unggulan;
        $package->limit_photo_per_listing   = $request->limit_photo;
        $package->save();

        return redirect('dashboard/package');
    }

    public function edit($id){
        $package = Package::find($id);
        return view('dashboard.package.edit_package', ['package' => $package]);
    }

    public function update(Request $request){
        $package = Package::find($request->id);
        $package->name                      = Str::upper($request->nama_paket);
        $package->price                     = $request->harga_paket;
        $package->limit_listing             = $request->limit_listing;
        $package->limit_unggulan            = $request->limit_unggulan;
        $package->limit_photo_per_listing   = $request->limit_photo;
        $package->save();

        return redirect('dashboard/package');
    }

    public function delete($id){
        $package = Package::find($id);
        $member = DB::table('memberships')
                    ->where('package_id', $id)
                    ->update(['package_id' => 1]);
        
        $StatusDelete = StatusDelete::create([
            'table_name'    => 'Packages',
            'table_id'      => $id,
            'status'        => 'deleted',
            'username'      =>auth()->user()->username
        ]);

        // $package->delete();
        return redirect('dashboard/package');
    }
}