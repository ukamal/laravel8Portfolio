<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\ContactForm;
use App\Models\Subcribe;
use Illuminate\Support\Carbon;

class ContactController extends Controller
{
    public function adminContact(){
        $contacts = Contact::all();
         return view('admin.contact.index',compact('contacts'));
    }

    public function addContact(){
        return view('admin.contact.add_contact');
    }

    public function storContact(Request $request){
        $validate = $request->validate([
            'address' => 'required',
            'email' => 'required',
            'phone' => 'required',
        ]);

        $contact = new Contact;
        $contact->address = $request->address;
        $contact->email = $request->email;
        $contact->phone = $request->phone;
        $contact->save();

        return redirect()->route('all-contact')->with('success','Contact info added successfully');
    }

    public function editContact($id){
        $contacts = Contact::find($id);
        return view('admin.contact.edit_contact',compact('contacts'));
    }

    public function updateContact(Request $request, $id){
        $contacts = Contact::find($id);
        $contacts->address = $request->address;
        $contacts->email = $request->email;
        $contacts->phone = $request->phone;
        $contacts->update();

        return redirect()->route('all-contact')->with('success','Contact info updated successfully');
    }

    public function deleteContact($id){
        $contacts = Contact::find($id);
        $contacts->delete();

        return redirect()->route('all-contact')->with('success','Contact info delete successfully');
    }

    //frontend contact page
    public function contact(){
        $contacts = Contact::first();
        return view('layouts.frontend.pages.contact',compact('contacts'));
    }

    public function storeConForm(Request $request){
        $validate = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'subject' => 'required',
            'message' => 'required',
        ]);
        ContactForm::insert([
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message,
            'created_at' => Carbon::now()
        ]);

        return redirect()->back()->with('success','Thanks for contacting me!');

    }

    public function viewConForm(){
        $contactforms = ContactForm::orderBy('id','desc')->get();
        return view('admin.contact.view_contact_form',compact('contactforms'));
    }

    public function deleteConForm($id){
        $delete = ContactForm::find($id);
        $delete->delete();
        return redirect()->back()->with('success','Client info delete successfully!');
    }

    //Subcribe Features
    public function subscribe(Request $request){
        $validate = $request->validate([
            'email' => 'required',
        ]);
        Subcribe::insert([
            'email' => $request->email,
            'created_at' => Carbon::now()
        ]);

        return redirect()->back()->with('success','Thanks for subcribe me!');
    }

    public function viewSubcribe(){
        $subcriber = Subcribe::orderBy('id','desc')->get();
        return view('admin.contact.subscriber',compact('subcriber'));
    }

    public function deleteSubcribe($id){
        $delete = Subcribe::find($id);
        $delete->delete();
        return redirect()->back()->with('success','Subcriber delete successfully!');
    }

    public function about(){
        return view('about');
    }
}
