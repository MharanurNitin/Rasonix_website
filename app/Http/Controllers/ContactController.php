<?php

namespace App\Http\Controllers;

use App\Mail\contactMail;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'phone_number' => 'required|min:10|max:14',
            'business_email' => 'email',
            'message' => 'min:20'
        ]);
        $contact = new Contact();
        $contact->name = $request->name;
        $contact->business_email = $request->business_email;
        $contact->phone_number = $request->phone_number;
        $contact->company_name = $request->company_name;
        $contact->message = $request->message;
        $contact->save();
        Mail::to('mharanurnitin@gmail.com')->send(new contactMail($request));
        return redirect()->back()->with('success', 'Thank you for contact us.we will contct you shortly.');
    }
    public function getdata()
    {
        $contacts = Contact::all();
        return view('admin_views.admin.all-contacts', compact('contacts'));
    }
    public function destroy($id)
    {
        $contact = Contact::find($id);
        $contact->delete();
        return redirect()->back()->with('success', "deleted Successfully");
    }
}
