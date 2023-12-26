<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RoutineController extends Controller
{
    //CREATE ROUTINE 
    public function createRoutine(){
        return view('admin.Routine.addRoutine');
    }
}
