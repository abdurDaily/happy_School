<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Admin\Facultystaff;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class FacultystaffController extends Controller
{




    //EMPLOYEE CREATE
    public function createEmployee()
    {
        return view('admin.employee.addEmployee');
    }


    // ALL EMPLOYEE'S SHOW HERE !!
    public function showEmployee()
    {
        $allEmployee = Facultystaff::all();
        return view('admin.employee.listEmployee', compact('allEmployee'));
    }


    // EDIT EMPLOYEE 
    public function editEmployee($id)
    {
        $editData = Facultystaff::findOrFail($id);
        return view('admin.employee.editEmployee', compact('editData'));
    }


    // DELETE EMPLOYEE ! 
    public function deleteEmployee($id)
    {
        Facultystaff::findOrFail($id)->delete();
        toast('delete employee!');
        return back();
    }



    // STORE AND UPDATE EMPLOYEE DATA
    function storeAndUpdate(Request $request, $id = null)
    {
       
        $request->validate([
            'employee_name' => 'required',
            'employee_designation' => 'required',
            'employee_phone' => 'required',
            'employee_email' => 'required',
            'employee_join_date' => 'required',
            'employee_about' => 'required',
        ]);

        if ($request->routeIs('admin.employee.store')) {
            $request->validate([
                'employee_image' => 'required|mimes:png,jpg,jpeg',
            ]);
        }


        $employeeData =  Facultystaff::findOrNew($id);
        if ($request->hasFile('employee_image')) {
            $extension = $request->employee_image->extension();
            $uniqName = $request->employee_name . "-" . uniqid($extension) . "." . $extension;
            $path = $request->employee_image->storeAs('employee', $uniqName, 'public');
        }

        $employeeData->employee_name = $request->employee_name;
        $employeeData->employee_designation = $request->employee_designation ?? $employeeData->employee_designation;
        $employeeData->employee_phone = $request->employee_phone ?? $employeeData->employee_phone;
        $employeeData->employee_email = $request->employee_email ?? $employeeData->employee_email;
        $employeeData->employee_join_date = $request->employee_join_date ?? $employeeData->employee_join_date;
        $employeeData->employee_about = $request->employee_about ?? $employeeData->employee_about;
        if ($request->hasFile('employee_image')) {

            $employeeData->employee_image = env('APP_URL') . 'storage/' .  $path;
        }
        $employeeData->save();
        Alert::success('Succcess');
        return back();
    }
}
