<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth.profile', [
            'only' => 'edit'
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();

        return view('user_index')->with('users', $users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create_user');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'gender' => 'required'
        ]);
        User::create($request->only(['name', 'email', 'gender']));
        Session::flash('message', 'User has been added successfully !');
        Session::flash('alert-class', 'alert-success');

        return redirect('/users');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('show_user')->with('user', $user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  /App/User  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('edit_user')->with('user', $user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required','unique:users,email,'.$user->id
        ]);
        $user->name = $request['name'];
        $user->email = $request['email'];
        $user->gender = $request['gender'];
        $user->save();
        Session::flash('message', 'User has been updated successfully !');
        Session::flash('alert-class', 'alert-info');

        return redirect('/users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User $user
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(User $user)
    {
        $user->delete();
        Session::flash('message', 'User has been removed successfully !');
        Session::flash('alert-class', 'alert-danger');
        return redirect('/users');
    }
}
