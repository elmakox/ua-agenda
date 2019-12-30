<?php

namespace App\Http\Controllers;

use App\Models\Progress;
use App\Models\Project;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class ProgressController extends Controller
{
    public function index()
    {
    	return view('progress.index');
    }
    
    public function datatable()
    {
    	$progress = Progress::all();
    	
    	return DataTables::of($progress)
	                     ->addColumn('actions', function ($data) {
	                     	return view('progress.inc.actionButton', compact('data'));
	                     })
	                     ->editColumn('date', function ($data) {
	                     	return $data->date->format('Y-m-d');
	                     })
	                     ->editColumn('title', function ($data) {
	                     	return $data->is_resource ? $data->title  . ' <span class="badge badge-soft-success">Resource</span>' : $data->title;
	                     })->rawColumns(['title'])
	                     ->make(true);
    }
    
    
    public function create()
    {
	    $projects = Project::all();
    	return view('progress.create', [
    		'projects' => $projects
	    ]);
    }
    
    public function store(Request $request)
    {
	    $rules = [
		    'title' => 'required|string|max:255',
		    'body' => 'required|string|',
		    'progress_date' => 'required|date|',
	    ];
	    $this->validate($request, $rules);
	    
	    $progress = new Progress();
	    
	    $progress->title = $request->title;
	    $progress->body = $request->body;
	    $progress->medias = $request->media ? array_values($request->media) : [];
	    $progress->date = $request->progress_date;
	    $progress->is_resource = (boolean)$request->is_resource;
	
	    if ($progress->save()) {
		    $progress->projects()->sync( $request->projects );
	    }
	
	    return redirect()->route('progress.index')->with('success', 'Progress created successfully');
    }
    
    public function edit(Progress $progress)
    {
	    $projects = Project::all();
	    return view('progress.edit', [
	    	'progress' => $progress,
		    'projects' => $projects
	    ]);
    }
    
    public function update(Request $request, Progress $progress)
    {
	    $rules = [
		    'title' => 'required|string|max:255',
		    'body' => 'required|string|',
		    'progress_date' => 'required|date|',
	    ];
	    $this->validate($request, $rules);
	
	    $progress->title = $request->title;
	    $progress->body = $request->body;
	    $progress->medias = $request->media ? array_values($request->media) : [];
	    $progress->date = $request->progress_date;
	    $progress->is_resource = (boolean)$request->is_resource;
	
	    if ($progress->update()) {
		    $progress->projects()->sync( $request->projects );
	    }
	
	    return redirect()->route('progress.index')->with('success', 'Progress updated successfully');
    }
    
    public function destroy(Progress $progress)
    {
    	$progress->delete();
    	
    	return response()->json(null, 200);
    }
}
