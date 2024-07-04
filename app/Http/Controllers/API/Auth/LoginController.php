<?php

namespace App\Http\Controllers\API\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{

    public function __construct()
    {
        $this->middleware('guest');
    }
    /**
     * Handle the incoming request.
     */
    public function __invoke(LoginRequest $request)
    {

        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json([
                'message' => 'Invalid credentials'
            ], 401);
        }

        $token = $user->createToken('ems')->plainTextToken;

        return response()->json([
            'status' => 'success',
            'message' => 'You have logged in successfully',
            'access_token' => $token,
        ], 200);
    }
}
