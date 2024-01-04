<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Admin\Aboutgallery;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class AboutController extends Controller
{
    /**__{--ABOUT_INDEX--}__ */
    public function aboutIndex()
    {
        return view('admin.about.about');
    }


    /**__{__ABOUT_GALARY__}__ */
    public function aboutGallery()
    {
        return view('admin.about.aboutgallery');
    }


    /**__{__STORE AND UPDATEABOUT_GALARY__}__ */

    public function storeUpdateAboutGallery(Request $request, $id=null)
    {

        $request->validate([
            'about_galary_text' => 'required',
        ]);


        if ($request->routeIs('admin.store.about.galary')) {
            $request->validate([
                'about_galary_img' => 'required|mimes:png,jpeg,jpg',
            ]);
        }

        if ($request->hasFile('about_galary_img')) {
            $extension = $request->about_galary_img->extension();
            $uniqName = $request->about_galary_img->getClientOriginalName() . "-" . uniqid() . "." . $extension;
            $path = $request->about_galary_img->storeAs('about_galary', $uniqName, 'public');
        }



        $sboutGalleryData = aboutGallery::findOrNew($id);  
        $sboutGalleryData->about_galary_text = $request->about_galary_text ?? $sboutGalleryData->about_galary_text;
            if ($request->hasFile('about_galary_img')) {
                $sboutGalleryData->about_galary_img = env('APP_URL') . 'storage/' . $path ?? $sboutGalleryData->about_galary_img;
            }
        $sboutGalleryData->save();
        Alert::success('success!');
        return back();
    }

    /**__{__LIST_ABOUT_GALARY__}__ */
    public function listAboutGallery(){
        $listData = Aboutgallery::latest()->get();
        return view('admin.about.listaboutgallery', compact('listData'));
    }












}
