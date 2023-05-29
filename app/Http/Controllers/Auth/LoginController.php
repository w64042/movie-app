<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;

class LoginController extends Controller
{

    public function login(Request $request)
    {
        $credentials = $request->only(['email', 'password']);
        if(!$token = auth()->attempt($credentials)){
            return response()->json(['error' => 'Unauthorized'], 401);
        }
        return response()->json(['token' => $token]);
    }

    public function logout()
    {
        auth()->logout();
        return response()->json(['message' => 'Successfully logged out']);
    }

    public function register(Request $request)
    {
        $user = User::create([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => bcrypt($request->get('password'))
        ]);

        return new UserResource($user);
    }



}
