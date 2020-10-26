<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

use App\Models\Package;
use App\Models\Membership;
use App\Models\UserActivity;
use App\Models\StatusDelete;

class PackageController extends Controller
{
    public function index(){
        UserActivity::create([
            'do'    => 'List-Paket',
            'description'      => 'Melihat daftar paket yang tersedia',
            'route'        => '/dashboard/package',
            'username'      =>auth()->user()->username
        ]);
        
        $packages = Package::all();
        // dd($packages);
        return view('dashboard.package.package', ['packages'=>$packages]);
    }

    public function create(){
        return view('dashboard.package.create_package');
    }

    public function store(Request $request){
        $request->validate([
            'name' => ['required', 'unique:packages'],
            'price' => ['required', 'numeric'],
            'limit_listing' => ['required', 'numeric'],
            'limit_unggulan' => ['required', 'numeric'],
            'limit_photo' => ['required', 'numeric'],
        ]);

        $package = new Package;
        $package->name                      = Str::upper($request->name);
        $package->price                     = $request->price;
        $package->limit_listing             = $request->limit_listing;
        $package->limit_unggulan            = $request->limit_unggulan;
        $package->limit_photo_per_listing   = $request->limit_photo;
        $package->save();

        UserActivity::create([
            'do'    => 'Tambah-Paket',
            'description'      => 'Menambahkan paket baru',
            'route'        => '/dashboard/package/create',
            'username'      =>auth()->user()->username
        ]);

        return redirect('dashboard/package');
    }

    public function edit($id){
        $package = Package::find($id);
        return view('dashboard.package.edit_package', ['package' => $package]);
    }

    public function update(Request $request){
        $request->validate([
            'name' => ['required'],
            'price' => ['required', 'numeric'],
            'limit_listing' => ['required', 'numeric'],
            'limit_unggulan' => ['required', 'numeric'],
            'limit_photo' => ['required', 'numeric'],
        ]);

        $package = Package::find($request->id);
        $package->name                      = Str::upper($request->name);
        $package->price                     = $request->price;
        $package->limit_listing             = $request->limit_listing;
        $package->limit_unggulan            = $request->limit_unggulan;
        $package->limit_photo_per_listing   = $request->limit_photo;
        $package->save();

        UserActivity::create([
            'do'    => 'Edit-Paket',
            'description'      => 'Memperbarui paket',
            'route'        => '/dashboard/package/edit/'.$request->id,
            'username'      =>auth()->user()->username
        ]);

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

        $package->delete();

        UserActivity::create([
            'do'    => 'Delete-Paket',
            'description'      => 'Menghapus Paket',
            'route'        => '/dashboard/package/delete'.$id,
            'username'      =>auth()->user()->username
        ]);
        return redirect('dashboard/package');
    }
}