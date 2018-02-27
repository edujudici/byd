<?php

namespace App\Http\Api;

use Mail;
use App\Http\Api\ContactInterface;
use App\Models\Company;
use App\Models\Contact;

class ContactServiceImpl implements ContactInterface
{
	protected $company;
    protected $contact;
    
    public function __construct(Company $company, Contact $contact)
    {
        $this->company = $company;
        $this->contact = $contact;
    }

    public function getCompany()
    {
        return $this->company->first();
    }
    
    public function getData()
    {
        $data = [
            'company' => $this->getCompany()
        ];
        return response()->api($data);
    }

    private function shootEmail()
    {
        $data = [
            'title' => 'Dados do E-mail',
            'name' => $this->contact->CON_NAME,
            'lastname' => $this->contact->CON_LASTNAME,
            'email' => $this->contact->CON_EMAIL,
            'phone' => $this->contact->CON_PHONE,
            'bodyMessage' => $this->contact->CON_MESSAGE,
        ];

        debug("send email to {$this->contact->CON_EMAIL}");
        Mail::send('email.send', $data, function($message)
        {
            $message->from('edujudici@gmail.com', 'Eduardo');
            $message->to('edujudici@gmail.com');
        });
        debug('email successfully sent!');
    }

    public function send($request)
    {
        $this->contact->CON_NAME = $request->name;
        $this->contact->CON_LASTNAME = $request->lastName;
        $this->contact->CON_EMAIL = $request->email;
        $this->contact->CON_PHONE = $request->phone;
        $this->contact->CON_MESSAGE = $request->message;
        $this->contact->save();

        $this->shootEmail();

        return response()->api($this->contact);
    }
}