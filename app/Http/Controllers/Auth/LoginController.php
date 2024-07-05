<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function create(Request $request)
    {
        // dd($request->remember);

        if (!auth()->attempt($request->only('email', 'password'), $request->remember)) {
            return  back()->with('status', 'Invalid Credentials');
        }
        // return redirect()->route('home'); //redirect to fixed page which is mentioned
        return redirect()->intended('/'); //redirect to previous page from where login page opened

    }
}