<?php

namespace App\Http\Controllers\Movies;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    // api crud

    public function index()
    {
        return response()->json(['message' => 'Hello World']);
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function update(Request $request, Movie $movie)
    {
        //
    }

    public function destroy(Movie $movie)
    {
        //
    }
}
