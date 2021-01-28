<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        return view('settings.index');
    }

    public function update(Request $request)
    {
        $inputs = array_except($request->input(), ['_token']);
        foreach($inputs as $key => $value) {
            $option = Setting::firstOrCreate(['key' => $key]);
            $option->value = is_array($value) ? json_encode($value) : $value;
            $option->save();
        }
        return response()->json(null, 200);
    }
}
