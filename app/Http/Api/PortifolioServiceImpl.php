<?php

namespace App\Http\Api;

use App\Http\Api\PortifolioInterface;
use App\Models\Portifolio;
use App\Models\PortfolioType;

class PortifolioServiceImpl implements PortifolioInterface {

    protected $portfolio;
	protected $portfolioType;
    
    public function __construct(Portifolio $portfolio, PortfolioType $portfolioType)
    {
        $this->portfolio = $portfolio;
        $this->portfolioType = $portfolioType;
    }
    
    public function getData()
    {
        $data = [
            'portfolio' => $this->portfolio->all(),
            'types' => $this->portfolioType->all()
        ];
        return response()->api($data);
    }
}