<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Http\Api\ContactInterface;

class DefaultComposer
{

    protected $contactI;

    public function __construct(ContactInterface $contactI)
    {
        $this->contactI = $contactI;
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $response = $this->contactI->getCompany();
        $view->with('company', json_encode($response));
    }
}