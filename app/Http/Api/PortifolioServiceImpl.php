<?php

namespace App\Http\Api;

use App\Http\Api\PortifolioInterface;
use App\Models\Portifolio;

class PortifolioServiceImpl implements PortifolioInterface {

	protected $portfolio;
    
    public function __construct(Portifolio $portfolio)
    {
        $this->portfolio = $portfolio;
    }
    
    public function getData()
    {
        $data = [
            'portfolio' => $this->portfolio->all()
        ];
        return response()->api($data);
    }
}