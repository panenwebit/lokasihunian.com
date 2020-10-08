<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

use App\Models\User;

class RoleController extends Controller
{
    public function index(){
        $roles = Role::all();
        return view('dashboard.setting.roles_list', ['roles'=>$roles]);
    }

    public function editRole(){
        return view('dashboard.setting.edit_role');
    }

    public function editRolePermission(){
        return view('dashboard.setting.edit_role_permission');;
    }

    public function testRole(){
        // $user = User::find('techlead');
        // $user->assignRole('IT');
        // $users = User::role('IT')->get();
        // $permission = Permission::create(['name'=>'test-it']);
        // $roles = Role::findByName('IT');
        // $roles->givePermissionTo('test-it');
        return 'a';
    }
}
