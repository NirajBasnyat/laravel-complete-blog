<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;

class ProfilesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.users.profile')->with('user',Auth::user()); // Get the currently authenticated user(single)
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'email' => 'required|email',
            'facebook' => 'url|required',
            'youtube' => 'url|required'
        ]);

        $user = Auth::user();

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->profile->facebook = $request->input('facebook');
        $user->profile->youtube = $request->input('youtube');
        $user->profile->about = $request->input('about');

        $user->save();
        $user->profile->save();
        

        if ($request->has('password')) {
            $user->password = bcrypt($request->input('password'));
            //$user->save();
        }
       // $user->profile()->save();
       // $user->save();

        Session::flash('success','Profile Updated successfully');

        return redirect()->route('user.profile');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       

    }
}
