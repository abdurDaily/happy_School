<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    // ROLE CREATE 
    public function roleCreate(){
        $allRoles = Role::where('name', '!=', 'admin')->get();
        return view('admin.role.addRole', compact('allRoles'));
    }


    // ROLE STORE 
    public function roleStore(Request $request){
        $request->validate([
            'name' => 'required|unique:roles,name',
        ]);

        $roleData = new Role();
        $roleData->name = $request->name;
        $roleData->save();
        return back();
    }
}
