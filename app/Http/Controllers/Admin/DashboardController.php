<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\Facultystaff;
use App\Models\Admin\Newsevent;
use App\Models\Admin\Notice;
use App\Models\Admin\Routine;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    //Dashoboard Page
    public function index(){
        $totalEmployee = Admin::select('name')
                ->count();
        $notice = Notice::select('id','notice_title','notice_image')
                ->latest()
                ->simplePaginate(7);
        $newEvent = Newsevent::select('id','event_title','event_img')
                ->latest()
                ->simplePaginate(4);
        $eventCount =  Newsevent::select('id','event_title','event_img')
                ->count();
        $facultyStaff = Facultystaff::all();
        $routine = Routine::select('id','routine_title', 'routine_image')
                ->latest()
                ->simplePaginate(7);
        return view('admin.dashboard',compact('totalEmployee','notice','newEvent','eventCount', 'facultyStaff','routine'));
    }


}
