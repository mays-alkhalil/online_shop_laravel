<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    // عرض صفحة الرسائل
    public function index()
    {
        $contacts = Contact::all(); // جلب جميع الرسائل
        return view('admin.contacts.index', compact('contacts'));
    }

 
    public function store(Request $request)
{
    // التحقق من المدخلات
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'message' => 'required|string',
    ]);

    // حفظ البيانات في قاعدة البيانات
    Contact::create([
        'name' => $validated['name'],
        'email' => $validated['email'],
        'message' => $validated['message'],
    ]);

    // إعادة التوجيه مع رسالة نجاح
    return redirect()->back()->with('success', 'Your message has been sent successfully.');
}



    
   // Delete a contact message
   public function destroy($id)
   {
       // Find the contact by ID
       $contact = Contact::find($id);

       // If the contact exists, delete it
       if ($contact) {
           $contact->delete();
           return redirect()->route('admin.contacts.index')->with('success', 'Message deleted successfully.');
       }

       // If not found, return with an error message
       return redirect()->route('admin.contacts.index')->with('error', 'Message not found.');
   }


public function indexFront()
{
    // Return the view for the contact page
    return view('front.contact');
}
}
