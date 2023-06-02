<?php

namespace App\Http\Controllers\Series;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SeriesController extends Controller
{

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

    public function update(Request $request, Series $series)
    {
        //
    }

    public function destroy(Series $series)
    {
        //
    }

}
