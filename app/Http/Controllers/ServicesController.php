<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Api\ServicesInterface;

class ServicesController extends Controller
{
    protected $servicesI;

    public function __construct(ServicesInterface $servicesI)
    {
        $this->servicesI = $servicesI;
    }

    public function show()
    {
    	$response = $this->servicesI->getData();
    	return view('services')
            ->with('response', json_encode($response));
    }
}
