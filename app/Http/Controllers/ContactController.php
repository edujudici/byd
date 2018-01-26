<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Api\ContactInterface;
use App\Http\Requests\ContactFormRequest;

class ContactController extends Controller
{
    protected $contactI;

    public function __construct(ContactInterface $contactI)
    {
        $this->contactI = $contactI;
    }

    public function show()
    {
    	$response = $this->contactI->getData();
    	return view('contact')
            ->with('response', json_encode($response));
    }

    public function send(Request $request)
    {
        return $this->contactI->send($request);
    }
}
