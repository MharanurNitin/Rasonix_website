<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    function contact(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'phone_number' => 'required|min:10|max:14',
        ]);
        $contact = new Contact();
        $contact->name = $request->name;
        $contact->business_email = $request->email;
        $contact->phone_number = $request->phone_number;
        $contact->company_name = $request->company_name;
        $contact->message = $request->message;
        $contact->save();
        return redirect()->back()->with('success', 'successfully submitted');
    }
}
