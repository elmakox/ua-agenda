<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class ProjectController extends Controller
{
    
    public function index()
    {
        return view('projects.index');
    }

    public function datatable()
    {
        $projects = Project::all();
        
        return DataTables::of($projects)
	                    ->editColumn('image', function ($data) {
	                    	return '<img src="' . asset($data->image_url()) . '" class="img-fluid rounded" style="max-width: 50px">';
	                    })
	                    ->editColumn('goals', function ($data) {
	                    	return $data->goals ? count($data->goals) : 0;
	                    })
				        ->addColumn('actions', function ($data) {
					        return view('projects.inc.actionButton', compact('data'));
				        })->rawColumns(['image'])
				        ->make(true);
    }
   
    public function create()
    {
	    return view('projects.create');
    }


    public function store(Request $request)
    {
//    	dd(array_values($request->goal));
	    $rules = [
		    'title' => 'required|string|max:255',
		    'body' => 'required|string|',
	    ];
	    $this->validate($request, $rules);
	    
	    $project = new Project();
	    $project->title = $request->title;
	    $project->body = $request->body;
	    $project->image = $request->image;
	    $project->goals = $request->goal ? array_values($request->goal) : [];
	    
	    $project->save();
    }


    public function edit(Project $project)
    {
        return view('projects.edit', compact('project'));
    }

    public function update(Request $request, Project $project)
    {
	    $rules = [
		    'title' => 'required|string|max:255',
		    'body' => 'required|string|',
	    ];
	    $this->validate($request, $rules);
	
	    $project->title = $request->title;
	    $project->body = $request->body;
	    $project->image = $request->image;
	    $project->goals = $request->goal ? array_values($request->goal) : [];
	
	    $project->update();
    }

 
    public function destroy(Project $project)
    {
        $project->delete();
        
        return response()->json(null, 200);
    }
}
