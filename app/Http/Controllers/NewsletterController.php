<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Api\NewsletterInterface;

class NewsletterController extends Controller
{
    protected $newsletterI;

    public function __construct(NewsletterInterface $newsletterI)
    {
        $this->newsletterI = $newsletterI;
    }

    public function save(Request $request)
    {
        return $this->newsletterI->save($request);
    }
}
