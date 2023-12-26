<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ContactController extends Controller
{
    /**(--CREATE CONTACT--) */
    public function createContact()
    {
        return view('admin.contact.addContact');
    }

    /**{---STORE AND UPDATE--} */
    public function contactCreateOrStore(Request $request, $id = null)
    {
        $request->validate([
            'contact_info' => 'required',
            'contact_location_link' => 'required',
            'contact_numbers' => 'required',
            'contact_email' => 'required',
            'contact_address' => 'required',
            'contact_schedule' => 'required',
        ]);

        $contactData = Contact::findOrNew($id);
        $contactData->contact_info = $request->contact_info ??  $contactData->contact_info;
        $contactData->contact_location_link = $request->contact_location_link ??  $contactData->contact_location_link;
        $contactData->contact_numbers = $request->contact_numbers ??  $contactData->contact_numbers;
        $contactData->contact_email = $request->contact_email ??  $contactData->contact_email;
        $contactData->contact_address = $request->contact_address ??  $contactData->contact_address;
        $contactData->contact_schedule = $request->contact_schedule ??  $contactData->contact_schedule;
        $contactData->save();
        Alert::success('success!');
        return redirect()->route('admin.contact.list');
    }

    /**{---CONTACT LIST---} */
    public function contactList(){
        $allContactData = Contact::all();
        return view('admin.contact.listContact',compact('allContactData'));
    }


    /**{--EDIT CONTACT--} */
    public function contactEdit($id){
      $editData = Contact::findOrFail($id);
    //   dd($editData);
      return view('admin.contact.editContact', compact('editData'));
    }

    /**{---DELETE CONTACT LIST---} */
    public function contactDelete($id){
       $deleteContactData = Contact::findOrFail($id);
       $deleteContactData->delete();
       Alert::warning('Deleted Successfully','click on ok');
       return redirect()->route('admin.contact.list');
    }
}
