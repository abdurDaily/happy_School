<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Frontend\Admission;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class AdmissionController extends Controller
{
    //CREATE ADMISSION 
    public function CreateAdmission() {
        return view('frontend.admission.createAdmission');
    }


    // STORE AND UPDATE ADMISSION 
    public function StoreAndUpdateAdmission(Request $request, $id=null){


        if ($request->hasFile('std_img')) {
            $extension = $request->std_img->extension();
            $uniqName = $request->std_img->getClientOriginalName() . "-" . uniqid() . "." . $extension;
            $path = $request->std_img->storeAs('Admission', $uniqName, 'public');
        }



        $admissionData = Admission::findOrNew($id);
        $admissionData->std_name = $request->std_name ?? $admissionData->std_name;
        $admissionData->father_name = $request->father_name ?? $admissionData->father_name;
        $admissionData->mother_name = $request->mother_name ?? $admissionData->mother_name;
        $admissionData->contact_no = $request->contact_no ??  $admissionData->contact_no;
        $admissionData->alter_contact_no = $request->alter_contact_no ??  $admissionData->alter_contact_no;
        $admissionData->email = $request->email ?? $admissionData->email;
        $admissionData->present_address = $request->present_address ?? $admissionData->present_address;
        $admissionData->birth_date = $request->birth_date ??  $admissionData->birth_date;
        $admissionData->division = $request->division ?? $admissionData->division;
        $admissionData->district = $request->district ?? $admissionData->district ;
        $admissionData->upazila = $request->upazila ?? $admissionData->upazila;
        $admissionData->village = $request->village ??  $admissionData->village;
        $admissionData->admission_class = $request->admission_class ?? $admissionData->admission_clas;
        $admissionData->admission_class_group = $request->admission_class_group ?? $admissionData->admission_class_group;
        if ($request->hasFile('std_img')) {
            $admissionData->std_img = env('APP_URL') . 'storage/' . $path;;
        }
        $admissionData->save();
        return back();
        Alert::success('inserted!');


    }
}
