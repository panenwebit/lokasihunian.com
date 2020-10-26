<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

use App\Models\UserActivity;
use App\Models\StatusDelete;

class PermissionController extends Controller
{
    public function index(){
        $permissions = Permission::all();
        return view('dashboard.setting.permissions_list', ['permissions'=>$permissions]);
    }
}
