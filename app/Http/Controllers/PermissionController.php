<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

use App\Models\Status_Delete;

class PermissionController extends Controller
{
    public function index(){
        $permissions = Permission::all();
        return view('dashboard.setting.permissions_list', ['permissions'=>$permissions]);
    }
}
