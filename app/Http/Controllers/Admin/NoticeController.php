<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Notice;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Return_;
use RealRashid\SweetAlert\Facades\Alert;

class NoticeController extends Controller
{
    //CREATE NOTICE 
    public function createNotice()
    {
        return view('admin.notice.addNotice');
    }


    // SHOW NOTICE 
    public function showNotice(){
        $allNotice = Notice::latest()->simplePaginate(10);
        return view('admin.notice.listNotice', compact('allNotice'));
    }


    // EDIT NOTICE 
    public function editNotice($id){
       $editData = Notice::findOrFail($id);
       return view('admin.notice.editNotice', compact('editData'));
    }


    // DELETE NOTICE 
    public function deleteNotice($id){
        Notice::findOrFail($id)->delete();
        Alert::success('Deleted!');
        return redirect()->route('admin.notice.show');
    }



    // STORE AND UPDATE START 
    public function storeAndUpdateNotice(Request $request, $id = null)
    {
        $request->validate([
           'notice_title' => 'required',
           'notice_details' => 'required',
        ]);

        if($request->routeIs('admin.notice.store')){
            $request->validate([
                'notice_image' => 'required|mimes:pdf,docx',
            ]);
        }



        // image validation 
        if ($request->hasFile('notice_image')) {
            $extension = $request->notice_image->extension();
            $uniqName = $request->notice_title . "-" . uniqid() . "." . $extension;
            $path = $request->notice_image->storeAs('notice', $uniqName, 'public');
        }


        $noticeData =  Notice::findOrNew($id);
        $noticeData->notice_title = $request->notice_title ??  $noticeData->notice_title = $request->notice_title;
        $noticeData->notice_details = $request->notice_details ?? $noticeData->notice_details = $request->notice_details;
        if ($request->hasFile('notice_image')) {
            $noticeData->notice_image = env('APP_URL') . "storage/" . $path;
        }
        $noticeData->save();
        Alert::success('success!');
        return redirect()->route('admin.notice.show');
    }


    // SEARCH NOTICE BASED ON NOTICE_TITLE 
    public function searchNotice(Request $request){
      $search_request = $request->search_notice;
      $searchData = Notice::query()->where('notice_title','LIKE', "%{$search_request}%")->simplePaginate(10);
      return view('admin.notice.searchNotice', compact('searchData'));
    }
}
