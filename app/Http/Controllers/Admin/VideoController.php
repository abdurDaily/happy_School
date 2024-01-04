<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\Video;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class VideoController extends Controller
{

    // VIDEO INDEX 
    public function videoIndex(){
        $allVideoData = Video::all();
        return view('admin.videos.videoindex',compact('allVideoData'));
    }


    // VIDEO STORE AND UPDATE
    public function videoStoreOrUpdate(Request $request)
    {
        // dd($request->id);
        $id = $request->id;
        $request->validate([
            'video_link' => 'required',
        ]);


        $videoData =  Video::findOrNew($id);
        $videoData->video_link = $request->video_link ??  $videoData->video_link;
        $videoData->save();

        Alert::success('success!');
        return back();
    }


    // EDIT VIDEO 
    public function videoEdit($id){
       $editVideoData =  Video::findOrFail($id);
       return view('admin.videos.videoindex', compact('editVideoData'));
    }


    // DELETE VIDEO 
    public function videoDelete($id){
     Video::findOrFail($id)->delete();
     return back();
    }

}
