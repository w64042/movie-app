<?php

namespace App\Http\Controllers\GeneralCinematography;

use App\Http\Controllers\Controller;
use App\Models\Genre;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    public function index()
    {
        $genres = Genre::all();

        return response()->json($genres);
    }

    public function show($id)
    {
        $genre = Genre::findOrFail($id);

        return response()->json($genre);
    }

    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|string'
        ]);

        $genre = Genre::create([
            'name' => $request->get('name')
        ]);

        return response()->json($genre);
    }

    public function update(Request $request, Genre $genre)
    {
        $request->validate([
            'name' => 'string'
        ]);

        $genre->update([
            'name' => $request->get('name')
        ]);

        return response()->json($genre);
    }

    public function destroy(Genre $genre)
    {
        $genre->delete();

        return response()->json(['message' => 'Genre deleted']);
    }

}
