<?php

namespace App\Http\Controllers;

use App\Http\Requests\SendContactRequest;
use App\Models\ContactModel;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact');
    }

    public function getAllContact()
    {
        $allContacts = ContactModel::all();
        return view('allContacts', compact('allContacts'));
    }

    public function sendContact(SendContactRequest $request)
    {
        ContactModel::create([
           'email' => $request['email'],
           'subject' => $request['subject'],
           'message' => $request['description']
        ]);

        return redirect('/shop');
    }

    public function deleteContact(ContactModel $contact)
    {
        $contact->delete();
        return redirect()->back();
    }
}
