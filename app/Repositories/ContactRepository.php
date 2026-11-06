<?php

namespace App\Repositories;

use App\Models\ContactModel;

class ContactRepository
{
    private $contactModel;

    public function __construct()
    {
        $this->contactModel = new ContactModel();
    }

    public function createNewContact($request)
    {
        $this->contactModel::create([
            'email' => $request['email'],
            'subject' => $request['subject'],
            'message' => $request['description']
        ]);
    }
}
