<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class RegisterController extends Controller
{
    public function index()
    {
        return view('auth.register');
    }


    public function create(RegisterRequest $request)
    {

        DB::beginTransaction();
        try {
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);
            
            DB::commit();

            Auth::attempt($request->only('email', 'password'));

            return redirect('/');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error');
        }
    }
}