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
