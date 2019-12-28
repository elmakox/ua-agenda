<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\AspirationResource;
use App\Models\Aspiration;

class AspirationController extends Controller
{
	public function index()
	{
		$aspirations = Aspiration::latest()->get();
		
		return AspirationResource::collection($aspirations);
	}
	
	public function get(Aspiration $aspiration)
	{
		return new AspirationResource($aspiration);
	}
}
