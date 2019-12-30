<?php

namespace App\Http\Controllers;

use App\Models\Aspiration;
use App\Models\Page;
use App\Models\Project;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class PageController extends Controller
{
    public function index()
    {
    	return view('pages.index');
    }
    
    public function datatable()
    {
    	$pages = Page::all();
    	
    	return DataTables::of($pages)
	                     ->addColumn('actions', function ($data) {
	                     	return view('pages.inc.actionButton', compact('data'));
	                     })
	                     ->make(true);
    }
    
    public function create()
    {
    	$projects = Project::all();
    	$aspirations = Aspiration::all();
    	return view('pages.create', [
    		'projects' => $projects,
		    'aspirations' => $aspirations
	    ]);
    }
    
    public function store(Request $request)
    {
	    $rules = [
		    'title' => 'required|string|max:255',
		    'body' => 'required|string|',
	    ];
	    $this->validate($request, $rules);
	    
	    $page = new Page();
	    
	    $page->title = $request->title;
	    $page->body = $request->body;
	    $page->media = $request->media ? array_values($request->media) : [];
	    $page->additional_links = $request->link ? array_values($request->link) : [];
	    
	    if ($page->save()) {
	        $page->projects()->sync($request->projects);
	        $page->aspirations()->sync($request->aspirations);
	        
	        return redirect()->route('pages.index')->with('success', 'Page created successfully');
	    }
	
//	    return redirect()->route('pages.index')->with('success', 'Page created successfully');
    }
    
    public function edit(Page $page)
    {
	    $projects = Project::all();
	    $aspirations = Aspiration::all();
    	return  view('pages.edit', [
    		'page' => $page,
		    'projects' => $projects,
		    'aspirations' => $aspirations
	    ]);
    }
    
    public function update(Request $request, Page $page)
    {
	    $rules = [
		    'title' => 'required|string|max:255',
		    'body' => 'required|string|',
	    ];
	    $this->validate($request, $rules);
	
	    $page->title = $request->title;
	    $page->body = $request->body;
	    $page->media = $request->media ? array_values($request->media) : [];
	    $page->additional_links = $request->link ? array_values($request->link) : [];
	
	    if ($page->update()) {
		    $page->projects()->sync($request->projects);
		    $page->aspirations()->sync($request->aspirations);
		
		    return redirect()->route('pages.index')->with('success', 'Page updated successfully');
	    }
    }
    
    public function destroy(Page $page)
    {
    	$page->delete();
	
	    return response()->json(null, 200);
    }
}
