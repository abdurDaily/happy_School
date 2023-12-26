<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Newsevent;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class NewseventController extends Controller
{
    //CREATE NEWS AND EVENT 
    public function createEvent()
    {
        return view('admin.Newsevent.addNewsevent');
    }


    //STORE AND UPDATE METHOD
    public function storeOrUpdate(Request $request, $id = null)
    {

        $request->validate([
            'event_title' => 'required',
            'event_detail' => 'required',
        ]);

        if ($request->routeIs('admin.event.store')) {
            $request->validate([
                'event_img' => 'required|mimes:png,jpg,jpeg',
            ]);
        }

        $eventData = Newsevent::findOrNew($id);

        if ($request->hasFile('event_img')) {
            $extension = $request->event_img->extension();
            $uniName = $request->event_title . '-' . uniqid() . '.' . $extension;
            $path = $request->event_img->storeAs('Events', $uniName, 'public');
        }

        $eventData->event_title = $request->event_title ?? $eventData->event_title;
        $eventData->event_detail = $request->event_detail ?? $eventData->event_detail;
        if ($request->hasFile('event_img')) {
            $eventData->event_img = env('APP_URL') . 'storage/' . $path;
        }
        $eventData->event_video = $request->event_video;
        $eventData->save();
        Alert::success('inserted!');


        return redirect()->route('admin.event.list');
    }


    //LIST OF ALL EVENT'S
    public function listEvent()
    {
        $allEventData = Newsevent::latest()->get();
        return view('admin.Newsevent.listNewsevent', compact('allEventData'));
    }


    //EDIT EVENT 
    public function editEvent($id)
    {
        $editData = Newsevent::findOrFail($id);
        return view('admin.Newsevent.editNews', compact('editData'));
    }


    // DELETE EVENT 
    public function deleteOrUpdate($id)
    {
        Newsevent::findOrFail($id)->delete();
        Alert::success('Deleted..!');
        return redirect()->back();
    }
}
