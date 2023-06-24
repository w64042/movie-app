<?php

namespace App\Http\Controllers\Movies;

use App\Http\Controllers\Controller;
use App\Models\Movie\Movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function index()
    {
        $movies = Movie::all();
        return collect($movies);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'genre_id' => 'required|int',
            'director_id' => 'required|int',
        ]);

        $movie = Movie::create([
            $request->all()
        ]);

        return response()->json($movie);
    }

    public function show($id)
    {
        $movie = Movie::findOrFail($id);

        return response()->json($movie);
    }

    public function update(Request $request, Movie $movie)
    {
        $request->validate([
            'title' => 'string',
            'description' => 'string',
            'genre_id' => 'int',
            'director_id' => 'int',
        ]);

        $movie->update([
            $request->all()
        ]);

        return response()->json($movie);
    }

    public function destroy(Movie $movie)
    {
        $movie->delete();

        return response()->json(['message' => 'Movie deleted']);
    }
}
