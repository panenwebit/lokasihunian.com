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

    public function editRole($name){
        $role = Role::findByName($name);
        return view('dashboard.setting.edit_role', ['role' => $role]);
    }

    public function updateRole(Request $request){
        $role = Role::findByName($request->old_role);
        $role->name = $request->nama_role;
        $role->save();

        return redirect('dashboard/setting/roles');
    }

    public function editRolePermission($name){
        $role = Role::findByName($name);
        $role_permission = $role->getAllPermissions();
        $permissions = Permission::all();
        
        return view('dashboard.setting.edit_role_permission', ['role' => $role, 'role_permission'=>$role_permission, 'permissions'=>$permissions]);
    }

    public function updateRolePermission(Request $request){
        $role = Role::findByName($request->old_role); 
        $role->syncPermissions($request->permission);
        return redirect('dashboard/setting/roles');
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
