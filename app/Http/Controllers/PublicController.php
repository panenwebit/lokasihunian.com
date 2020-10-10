<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

use App\Models\Status_Delete;

class PublicController extends Controller
{
    public function root(){
        // $role = Role::all();
        return view('welcome');
    }
}
