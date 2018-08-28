<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Session;
use App\User;
use App\Profile;

class UsersController extends Controller
{
    // to perform authorized action
    public function __construct()
    {
        $this->middleware('admin');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('admin.users.index')->with('users',$users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'email' => 'required|email'
        ]);

        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' =>bcrypt('password')
        ]);

        Profile::create([
            'user_id' => $user->id
        ]);

        Session::flash('success','New user created !');
        return redirect()->route('user.index');
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);

        $user->profile->delete();

        $user->delete();

        Session::flash('success','User profile deleted successfully');

        return redirect()->route('user.profile');
    }

    public function admin($id)
    {
        $user = User::find($id);
        $user->admin = 1;

        $user->save();

        Session::flash('success', 'Admin permission granted');

        return redirect()->route('user.index');
    }

    public function notadmin($id)
    {
        $user = User::find($id);
        $user->admin = 0;

        $user->save();

        Session::flash('success', 'Admin permission removed');

        return redirect()->route('user.index');
    }
}
