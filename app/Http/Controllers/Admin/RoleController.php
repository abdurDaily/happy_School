<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    // ROLE CREATE 
    public function roleCreate(){
        $allRoles = Role::where('name', '!=', 'admin')->get();
        $permissions = Permission::select('id', 'name')->get();
        return view('admin.role.addRole', compact('allRoles','permissions'));
    }


    // ROLE STORE 
    public function roleStore(Request $request){
        $request->validate([
            'name' => 'required|unique:roles,name',
        ]);

        $roleData = new Role();
        $roleData->name = $request->name;
        $roleData->guard_name ='admin';
        $roleData->save();
        return back();
    }



    //* ROLE EDIT
    public function roleEdit($id) {
        $roleData = Role::findOrFail($id);
        dd($roleData);
    }


    // * ROLE UPDATE 
    public function roleUpdate(Request $request, $id){
        
        // dd($request->permission_id);
        $role = Role::find($id);
        $role->name = $request->name;
        $permissionIds = array_map('intval', $request->permission_id);
        $role->syncPermissions($permissionIds);
        $role->save();
    }
}
