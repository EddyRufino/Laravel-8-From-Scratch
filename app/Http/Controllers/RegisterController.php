<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function create()
    {
        return view('register.create');
    }

    public function store()
    {
        $data = request()->validate([
            'name' => 'required|max:250',
            'username' => 'required|min:3|max:250|unique:users,username',
            'email' => 'required|max:250|email|unique:users,email',
            'password' => 'required|min:7|max:250',
        ]);

        $user = User::create($data);

        auth()->login($user);

        return redirect('/')->with('success', 'Your account has been created.');
    }
}
