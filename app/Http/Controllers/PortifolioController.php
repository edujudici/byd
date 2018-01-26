<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Api\PortifolioInterface;

class PortifolioController extends Controller
{
    protected $portifolioI;

    public function __construct(PortifolioInterface $portifolioI) {
        $this->portifolioI = $portifolioI;
    }

    public function show() {
    	$response = $this->portifolioI->getData();
    	return view('portifolio')
            ->with('response', json_encode($response));
    }
}
