<?php

namespace App\Http\Controllers\Series;

use App\Http\Controllers\Controller;
use App\Models\Series\Series;
use Illuminate\Http\Request;

class SeriesController extends Controller
{

    public function index()
    {
        $series = Series::all();
        return collect($series);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'seasons' => 'required|int',
            'episodes' => 'required|int',
            'genre_id' => 'required|int',
            'director_id' => 'required|int',
        ]);

        $series = Series::create([
            $request->all()
        ]);

        return response()->json($series);
    }

    public function show($id)
    {
        $series = Series::findOrFail($id);

        return response()->json($series);
    }

    public function update(Request $request, Series $series)
    {
        $request->validate([
            'title' => 'string',
            'description' => 'string',
            'seasons' => 'int',
            'episodes' => 'int',
            'genre_id' => 'int',
            'director_id' => 'int',
        ]);

        $series->update([
            $request->all()
        ]);

        return response()->json($series);
    }

    public function destroy(Series $series)
    {
        $series->delete();

        return response()->json(['message' => 'Series deleted']);
    }

}
