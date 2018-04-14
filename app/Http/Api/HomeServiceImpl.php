<?php

namespace App\Http\Api;

use App\Http\Api\HomeInterface;
use App\Models\Banner;
use App\Models\ServicesOffer;
use App\Models\Partners;
use App\Models\Video;

class HomeServiceImpl implements HomeInterface
{
    	
	protected $banner;
    protected $servicesOffer;
    protected $partners;
    protected $video;
    
    public function __construct(Banner $banner, ServicesOffer $servicesOffer, Partners $partners, Video $video)
    {
        $this->banner = $banner;
        $this->servicesOffer = $servicesOffer;
        $this->partners = $partners;
        $this->video = $video;
    }
    
    public function getData()
    {
        $data = [
            'banners' => $this->banner->orderBy('BAN_ORDER')->get(),
            'servicesOffer' => $this->servicesOffer->all(),
            'partners' => $this->partners->all(),
            'videos' => $this->video->all()
        ];
        return response()->api($data);
    }
}