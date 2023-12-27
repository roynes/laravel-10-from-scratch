<?php

namespace App\Http\Controllers;

use Dotenv\Exception\ValidationException;

class SessionsController extends Controller
{
    public function create()
    {
        return view('sessions.create');
    }


    public function store()
    {
        $attributes = request()->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if(auth()->attempt($attributes))
            return redirect('/')->with('success', 'Logged in.');

        // basically the same as below
        // throw ValidationException::withMessages([
        //     'email' => 'Provided credentials could not be verified.'
        // ]);

        return back()->withErrors(['email' => 'Provided credentials could not be verified.']);
    }

    public function destroy()
    {
        auth()->logout();

        return redirect('/')->with('success', 'Logged out.');
    }
}
