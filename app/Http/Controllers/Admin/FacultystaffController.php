<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Admin\Facultystaff;
// use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use App\Models\Admin\Admin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class FacultystaffController extends Controller
{




    //EMPLOYEE CREATE
    public function createEmployee()
    {
        $allRoles = Role::select('id', 'name')->get();
        return view('admin.employee.addEmployee', compact('allRoles'));
    }


    // ALL EMPLOYEE'S SHOW HERE !!
    public function showEmployee()
    {
        $allEmployee = Admin::latest()->simplePaginate(3);
        return view('admin.employee.listEmployee', compact('allEmployee'));
    }


    // EDIT EMPLOYEE 
    public function editEmployee($id)
    {
        $editData = Admin::findOrFail($id);
        $allRoles = Role::select('id', 'name')->get();
        // dd($allRoles);
        return view('admin.employee.editEmployee', compact('editData','allRoles'));
    }


    // DELETE EMPLOYEE ! 
    public function deleteEmployee($id)
    {
        Admin::findOrFail($id)->delete();
        toast('delete employee!');
        return redirect()->route('admin.employee.show');
    }


    // STORE AND UPDATE EMPLOYEE DATA
    function storeAndUpdate(Request $request, $id = null)
    {
        // dd($request->all());
        
        $request->validate([
            'name' => 'required',
            'email' => "required|email|unique:admins,email,". $id,
            'employee_designation' => 'required',
            'employee_phone' => 'required',
            'employee_about' => 'required',
            ]);

            
            if ($request->routeIs('admin.employee.store')) {
                $request->validate([
                'password' => "required|min:8",
                'employee_image' => 'required|mimes:png,jpg,jpeg',
            ]);
        }

        $employeeData =  Admin::findOrNew($id);
        if ($request->hasFile('employee_image')) {
            $extension = $request->employee_image->extension();
            $uniqName = $request->employee_name . "-" . uniqid() . "." . $extension;
            $path = $request->employee_image->storeAs('employee', $uniqName, 'public');
        }
        $employeeData->name = $request->name;
        $employeeData->email = $request->email ?? $employeeData->email;
        $employeeData->password = Hash::make($request->password) ?? Hash::make($request->password);
        $employeeData->employee_designation = $request->employee_designation ?? $employeeData->employee_designation;
        $employeeData->employee_phone = $request->employee_phone ?? $employeeData->employee_phone;
        $employeeData->employee_about = $request->employee_about ?? $employeeData->employee_about;
        
        if ($request->hasFile('employee_image')) {
            $employeeData->employee_image = env('APP_URL') . 'storage/' .  $path;
        }
        
        if($employeeData->save()){
            $employeeData->syncRoles($request->employee_role);

        }
        // $employeeData->save();
        Alert::success('Succcess');
        return redirect()->route('admin.employee.show');
    }


    // SEARCH EMPLOYEE 
    public function searchEmployee(Request $request)
    {
        $search = $request->search_employee;
        $allEmployee = Admin::query()->where('name', 'LIKE', "%{$search}%")->get();
        return view('admin.employee.searchEmployee', compact('allEmployee'));
    }
}
