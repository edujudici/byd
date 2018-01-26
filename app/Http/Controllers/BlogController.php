<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Api\BlogInterface;

class BlogController extends Controller
{
	protected $blogI;

    public function __construct(BlogInterface $blogI) {
        $this->blogI = $blogI;
    }

    public function show() {
    	return view('blog');
    }
}
