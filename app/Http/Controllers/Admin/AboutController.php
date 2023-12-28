<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    /**__{--ABOUT_INDEX--}__ */
    public function aboutIndex() {
        return view('admin.about.about');
    }
}
