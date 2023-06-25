<?php

namespace App\Http\Controllers\GeneralCinematography;

use App\Http\Controllers\Controller;
use App\Models\Director;
use Illuminate\Http\Request;

class DirectorController extends Controller
{

    public function index()
    {
        $directors = Director::all();

        return response()->json($directors);
    }

    public function show($id)
    {
        $director = Director::findOrFail($id);

        return response()->json($director);
    }

    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|string'
        ]);

        $director = Director::create([
            'name' => $request->get('name')
        ]);

        return response()->json($director);
    }

    public function update(Request $request, Director $director)
    {
        $request->validate([
            'name' => 'string'
        ]);

        $director->update([
            'name' => $request->get('name')
        ]);

        return response()->json($director);
    }

    public function destroy(Director $director)
    {
        $director->delete();

        return response()->json(['message' => 'Director deleted']);
    }

}
