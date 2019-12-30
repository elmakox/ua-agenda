<?php

namespace App\Http\Controllers;

use App\Models\Aspiration;
use App\Models\News;
use App\Models\Project;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class NewsController extends Controller
{
    public function index()
    {
    	return view('news.index');
    }
    
    public function datatable()
    {
        $news = News::all();
	
	    return DataTables::of($news)
	                     ->addColumn('actions', function ($data) {
		                     return view('news.inc.actionButton', compact('data'));
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
		$aspirations = Aspiration::all();
		return view('news.create', [
			'projects' => $projects,
			'aspirations' => $aspirations
		]);
	}
	
	public function store(Request $request)
	{
		$rules = [
			'title' => 'required|string|max:255',
			'body' => 'required|string|',
			'news_date' => 'required|date',
		];
		$this->validate($request, $rules);
		
		$news = new News();
		
		$news->title = $request->title;
		$news->body = $request->body;
		$news->medias = $request->media ? array_values($request->media) : [];
		$news->date = $request->news_date;
		$news->is_resource = (boolean)$request->is_resource;
		
		if ($news->save()) {
			$news->projects()->sync( $request->projects );
			$news->aspirations()->sync( $request->aspirations );
		}
		
		return redirect()->route('news.index')->with('success', 'News created successfully');
	}
	
	public function edit(News $news)
	{
		$projects = Project::all();
		$aspirations = Aspiration::all();
		return view('news.edit', [
			'news' => $news,
			'projects' => $projects,
			'aspirations' => $aspirations
		]);
	}
	
	public function update(Request $request, News $news)
	{
		$rules = [
			'title' => 'required|string|max:255',
			'body' => 'required|string|',
			'news_date' => 'required|date',
		];
		$this->validate($request, $rules);
		
		
		$news->title = $request->title;
		$news->body = $request->body;
		$news->medias = $request->media ? array_values($request->media) : [];
		$news->date = $request->news_date;
		$news->is_resource = (boolean)$request->is_resource;
		
		if ($news->save()) {
			$news->projects()->sync( $request->projects );
			$news->aspirations()->sync( $request->aspirations );
		}
		
		return redirect()->route('news.index')->with('success', 'News updated successfully');
	}
	
	
	public function destroy(News $news)
	{
		$news->delete();
		
		return response()->json(null, 200);
	}
}
