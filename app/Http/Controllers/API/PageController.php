<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\PageResource;
use App\Models\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
    	$pages = Page::latest()->get();
    	
    	return PageResource::collection($pages);
    }
	
	public function get(Page $page)
	{
		return new PageResource($page);
	}
}
