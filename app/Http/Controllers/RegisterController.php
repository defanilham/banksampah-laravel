<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function register()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
       $validatedData = $request->validate([
        'name' => 'required|max:255',
        'email' => 'required|email:dns|unique:users',
        'password' => 'required|min:8'
       ]);


       $validatedData['password'] = bcrypt($validatedData['password']);


       User::create($validatedData);

       $request->session()->flash('success', 'registration succesfull ! please login');

       return redirect('/login');
    }
}
