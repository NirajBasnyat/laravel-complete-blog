<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Setting;
use Session;


class SettingsController extends Controller
{
	public function __construct()
	{
		$this->middleware('admin');
	}
     
     public function index()
	
    {
        return view('admin.settings.settings')->with('setting',Setting::first());
    }

    public function update()
    {
    	$this->validate(request(),[
    		'site_name' => 'required',
    		'contact_number' => 'required',
    		'contact_email' => 'required',
    		'address' => 'required',
    	]);

    	$settings = Setting::first();

    	$settings->site_name = request()->input('site_name');
    	$settings->contact_number = request()->input('contact_number');
    	$settings->contact_email = request()->input('contact_email');
    	$settings->address = request()->input('address');

    	$settings->save();

    	Session::flash('success','Settings updated successfully');

    	return redirect()->route('setting.index');
    }
}
