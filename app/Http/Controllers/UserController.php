<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class UserController extends Controller
{
    public function index()
    {
    	return view('users.index');
    }
    
    public function datatable()
    {
    	$users = User::all();
    	
    	return DataTables::of($users)
	                     ->addColumn('actions', function ($data) {
	                     	return view('users.inc.actionButton', compact('data'));
	                     })
	                     ->make(true);
    }
    
    public function store(Request $request)
    {
	    $rules = [
		    'name' => 'required|string|max:255',
		    'email' => 'required|string|email|max:255|unique:users',
		    'password' => 'required|string|min:6',
	    ];
	    $this->validate($request, $rules);
	
	    $user = new User();
	
	    $user->name = $request->name;
	    $user->email = $request->email;
	    $user->password = bcrypt($request->password);
	
	    if ($user->save()) {
		    return response()->json(null, 200);
	    }
	
	    return response()->json(null, 401);
    }
    
    public function edit(User $user)
    {
    	return response()->json($user, 200);
    }
    
    public function update(Request $request, User $user)
    {
	    $rules = [
		    'name' => 'required|string|max:255',
		    'email' => 'required|string|email|max:255|unique:users,email,'.$user->id,
		    'password' => 'nullable|string|min:6',
	    ];
	    $this->validate($request, $rules);
	    $user->name = $request->name;
	    $user->email = $request->email;
	
	    if ($request->password && !empty($request->password)){
		    $user->password = bcrypt($request->password);
	    }
	
	    if ($user->update()) {
		    return response()->json(null, 200);
	    }
	
	    return response()->json(null, 401);
    }
    
    public function destroy(User $user)
    {
    	$user->delete();
    	
    	return response()->json(null, 200);
    }
}
