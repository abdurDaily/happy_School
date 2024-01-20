<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
    //Profile Page
    public function index($id = null){
        $data = Admin::all();
        dd($data);
        return view('admin.profile.admin_profile');
    }
}
