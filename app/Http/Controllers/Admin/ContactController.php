<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContactRequest;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function ContactList(){
        $contacts = Contact::all();
        return view("admin.pages.contactlist",compact("contacts"));
    }

    public function ContactEdit(Contact $contact){
        return view("admin.pages.contactedit",compact("contact"));
    }

    public function ContactUpdate(ContactRequest $request,Contact $contact){
        $contact->update($request->all());
        return back()->withSuccess('İletişim Güncelleme İşlemi Başarılı');
    }

    public function ContactDelete(Contact $contact){
        $contact->delete();
        return back()->with("success","İletişim Silme İşlemi Başarılı.");
    }
}
