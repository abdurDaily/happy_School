<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    //Dashoboard Page
    public function index(){
        $totalEmployee = Admin::select('name')->count();
        return view('admin.dashboard',compact('totalEmployee'));
    }
}
