<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();

        return UserResource::collection($users);
    }

    public function show($id)
    {
        $user = User::find($id);

        return new UserResource($user);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'email|required|unique:users',
            'password' => 'required|string|min:8|max:32'
        ]);

        $user = User::create([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => bcrypt($request->get('password'))
        ]);

        return new UserResource($user);
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);
        if($user->id !== auth()->user()->id){
            return response()->json(['error' => 'Forbidden'], 403);
        }
        $user->update([
            'name' => $request->get('name'),
            'email' => $request->get('email')
        ]);
        return response()->json($user);
    }

    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();

        return response()->json(['message' => 'User deleted']);
    }
}
