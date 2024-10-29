<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function show_contact()
    {
        // $contacts = Contact::orderBy('id', 'desc')->get();
        return view('contact');
    }

    public function add_contact()
    {
        
    }



    // ADMIN PART

    public function index()
    {
        $contacts = Contact::orderBy('id', 'desc')->get();
        return view('admin.contacts',compact('contacts'));
    }

    public function edit_contact($id)
    {
        $contacts = Contact::find($id);
        
        return view('admin.editContact', compact('contacts'));

    }

    public function update_response(Request $request,$id)
    {
      
      $contacts = Contact::find($id);

      $contacts->response = $request->response;
        
      $contacts->save();

      return redirect('contacts')->with('status', 'Response Updated!');

    }

    public function delete_contact($id)
    {
        $contacts = Contact::find($id);  

        $contacts->delete();

        return redirect()->back()->with('status', 'Contact deleted successfully');
    }
}
