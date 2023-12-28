<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Routine;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class RoutineController extends Controller
{
    //CREATE ROUTINE 
    public function createRoutine(){
        return view('admin.Routine.addRoutine');
    }

    // STORE AND UPDATE ROUTINE 
    public function storeOrUpdateRoutine(Request $request, $id = null){
        $request->validate([
           'routine_title' => 'required',
           ]);
           
           if($request->routeIs('admin.routine.store')){
            $request->validate([
                'routine_image' => 'required|mimes:pdf,docx',
            ]);
        }


        if($request->hasFile('routine_image')){
          $extension = $request->routine_image->extension();
          $uniName = 'Routine-' . uniqid() . '.' . $extension;
          $path = $request->routine_image->storeAs('routine', $uniName, 'public');
        }


        $routineData = Routine::findOrNew($id);
        $routineData->routine_title = $request->routine_title ?? $routineData->routine_title;
        if($request->hasFile('routine_image')){
        $routineData->routine_image = env('APP_URL') . 'storage/' . $path;
        }
        $routineData->save();
        Alert::toast('Success!');
        return redirect()->route('admin.routine.list');
    }


    /**---{__LIST OF ROUTINE__}--- */
    public function listRoutine(){
        $allRoutineData = Routine::latest()->paginate(10);
        return view('admin.Routine.listRoutine', compact('allRoutineData'));
    }


    /**---{__EDIT ROUTINE___}--- */
    public function editRoutine($id){
        $routineData =  Routine::findOrFail($id);
        return view('admin.Routine.editRoutine', compact('routineData'));
    }

    /**----{__DELETE ROUTINE___}--- */
    public function deleteRoutine($id){
       Routine::findOrFail($id)->delete();
       Alert::error('Deleted!');
       return redirect()->route('admin.routine.list');
    }
}
