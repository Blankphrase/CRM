<?php

namespace App\Http\Transformers;

use League\Fractal\TransformerAbstract;
use App\Contact;



class ContactTransformers extends TransformerAbstract
{
    public function transform(Contact $contact)
    {
        return [
          'id'=> $contact->id,
          'account_id' => $contact->account_id,
          'name' => $contact->name,
          'email' => $contact->email,
          'phone' => $contact->phone,
          'address' => $contact->address,
          'idnumber' => $contact->idnumber,
        ];
    }
}