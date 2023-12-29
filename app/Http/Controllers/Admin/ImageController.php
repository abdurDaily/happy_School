<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\Image;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class ImageController extends Controller
{
    //IMAGE INDEX 
    public function imageIndex(){
        $allImages = Image::all();
        return view('admin.images.addImages',compact('allImages'));
    }


    // IMAGE STORE AND UPDATE 
    public function imageStoreOrUpdate(Request $request, $id=null)
    {
        $request->validate([
           'img_title' => 'required',
        ]);

        if($request->routeIs('admin.image.store')){
            $request->validate([
                'galary_img' => 'required|mimes:png,jpeg,jpg',
            ]);
        }



        // image validation 
        if ($request->hasFile('galary_img')) {
            $extension = $request->galary_img->extension();
            $uniqName = $request->img_title . "-" . uniqid() . "." . $extension;
            $path = $request->galary_img->storeAs('galary', $uniqName, 'public');
        }


        $galaryData =  Image::findOrNew($id);
        $galaryData->img_title = $request->img_title ??  $galaryData->img_title;
        
        if ($request->hasFile('galary_img')) {
            $galaryData->galary_img = env('APP_URL') . "storage/" . $path;
        }
        $galaryData->save();
        Alert::success('success!');
        return back();
    }


    // IMAGE EDIT 
    public function imageEdit($id){
       $findedImage = Image::findOrFail($id);
       return view('admin.images.addImages',compact('findedImage'));
    }
}
