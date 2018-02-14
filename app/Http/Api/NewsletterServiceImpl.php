<?php

namespace App\Http\Api;

use App\Http\Api\NewsletterInterface;
use App\Models\Newsletter;

class NewsletterServiceImpl implements NewsletterInterface
{
    private $newsletter;
    
    public function __construct(Newsletter $newsletter)
    {
        $this->newsletter = $newsletter;
    }

    public function save($request)
    {
        $this->newsletter->NEW_NAME = $request->name;
        $this->newsletter->NEW_EMAIL = $request->email;
        $this->newsletter->save();

        return response()->api($this->newsletter);
    }
}