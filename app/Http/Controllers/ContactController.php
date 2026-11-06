<?php

namespace App\Http\Controllers;

use App\Http\Requests\SendContactRequest;
use App\Models\ContactModel;
use App\Repositories\ContactRepository;

class ContactController extends Controller
{

    private ContactRepository $contactRepo;

    public function __construct()
    {
        $this->contactRepo = new ContactRepository();
    }

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
        $this->contactRepo->createNewContact($request);

        return redirect('/shop');
    }

    public function deleteContact(ContactModel $contact)
    {
        $contact->delete();
        return redirect()->back();
    }
}
