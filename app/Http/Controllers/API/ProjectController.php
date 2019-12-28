<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProjectResource;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
    	$projects = Project::latest()->get();
    	
    	return ProjectResource::collection($projects);
    }
    
    public function get(Project $project)
    {
    	return new ProjectResource($project);
    }
}
