<?php

namespace App\Http\Controllers;

use App\Models\Aspiration;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class AspirationController extends Controller
{
	public function index()
	{
		return view('aspirations.index');
	}
	
	public function datatable()
	{
		$aspirations = Aspiration::all();
		
		return DataTables::of($aspirations)
		                 ->editColumn('image', function ($data) {
			                 return '<img src="' . asset($data->image_url()) . '" class="img-fluid rounded" style="max-width: 50px">';
		                 })
		                 ->editColumn('goals', function ($data) {
			                 return $data->goals ? count($data->goals) : 0;
		                 })
		                 ->addColumn('actions', function ($data) {
			                 return view('aspirations.inc.actionButton', compact('data'));
		                 })->rawColumns(['image'])
		                 ->make(true);
	}
	
	public function create()
	{
		return view('aspirations.create');
	}
	
	
	public function store(Request $request)
	{
//    	dd(array_values($request->goal));
		$rules = [
			'title' => 'required|string|max:255',
			'body' => 'required|string|',
		];
		$this->validate($request, $rules);
		
		$aspiration = new Aspiration();
		$aspiration->title = $request->title;
		$aspiration->body = $request->body;
		$aspiration->image = $request->image;
		$aspiration->goals = $request->goal ? array_values($request->goal) : [];
		
		$aspiration->save();
		
		return redirect()->route('aspirations.index')->with('success', 'Aspiration created successfully');
	}
	
	
	public function edit(Aspiration $aspiration)
	{
		return view('aspirations.edit', compact('aspiration'));
	}
	
	public function update(Request $request, Aspiration $aspiration)
	{
		$rules = [
			'title' => 'required|string|max:255',
			'body' => 'required|string|',
		];
		$this->validate($request, $rules);
		
		$aspiration->title = $request->title;
		$aspiration->body = $request->body;
		$aspiration->image = $request->image;
		$aspiration->goals = $request->goal ? array_values($request->goal) : [];
		
		$aspiration->update();
		
		return redirect()->route('aspirations.index')->with('success', 'Aspiration updated successfully');
	}
	
	
	public function destroy(Aspiration $aspiration)
	{
		$aspiration->delete();
		
		return response()->json(null, 200);
	}
}
