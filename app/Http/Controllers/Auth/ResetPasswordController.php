<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User as ModelsUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;

class ResetPasswordController extends Controller
{

    public function sendResetLinkEmail(Request $request)
    {
        // check if email exists
        $user = ModelsUser::where('email', $request->email)->first();
        if(!$user){
            return response()->json(['error' => 'User doesn\'t exist'], 400);
        }
        $token = Password::createToken($user);
        $user->sendPasswordResetNotification($token);

        return response()->json(['message' => 'Reset password link sent on your email id.']);
    }

    public function reset(Request $request)
    {
        $request->validate([
            'token' => 'required|string',
            'email' => 'required|string|email',
        ]);

        $user = ModelsUser::where('email', $request->email)->first();
        if(!$user){
            return response()->json(['error' => 'User doesn\'t exist'], 400);
        }
        if($user->tokens()->where('token', $request->token)->count()){
            return response()->json(['error' => 'Invalid token'], 400);
        }
        $user->password = bcrypt($request->password);
        $user->save();


        return response()->json($user);
    }
}
