<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    // ROLE CREATE 
    public function roleCreate(){
        $allRoles = Role::where('name', '!=', 'admin')->get();
        $permissions = Permission::select('id', 'name')->get();
        return view('admin.role.addRole', compact('allRoles','permissions'));
    }


    public function roleEdit($id){
        $allRoles = Role::get();
        $data = Role::find($id);
        return view('admin.role.editRole',compact('allRoles','data'));
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



    //* PERMISSION 
    public function permission($id) {
        $roleData = Role::with('permissions')->findOrFail($id);
        $permissions = Permission::get();
        $hasPermissions = $roleData->permissions->pluck('id');
        
        return view('admin.role.permission', compact('roleData','permissions','hasPermissions'));
    }


    // * ROLE UPDATE 
    public function permissionAssign(Request $request, $id){

        $role = Role::find($id);
        $role->name = $request->name;
        // $permissionIds = array_map('intval', $request->permission_id);
        // $role->syncPermissions($permissionIds);
        $role->save();
        Alert::success('updated!');
        return redirect()->route('admin.role.list');
    }


    //* ROLE LIST 
    public function roleList(){
        $allRoles =  Role::where('name', '!=', 'admin')->get();
        return view('admin.role.listRole',compact('allRoles'));
    }





    //* PERMISSION TEST
    public function permissionTest(Request $request, $id){
        $role = Role::find($id);
        $permissionIds = array_map('intval', $request->permission_id ?? []);
        $role->syncPermissions($permissionIds);
        $role->save();
        Alert::success('success!', 'permission inserted!');
        return redirect()->route('admin.role.create');
    }
}
