<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterUser;
use App\User;

class RegistrationController extends Controller
{
    public function create()
    {
        return view('registration.register');
    }

    public function store(RegisterUser $request)
    {
        //create and save the user
        $data = $request->only(['name', 'gender', 'email', 'dob']);
        $data['password'] = bcrypt($request->get('password'));
        $user = User::create($data);
        auth()->login($user);
        return redirect()->home();
    }
}
