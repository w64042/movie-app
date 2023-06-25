<?php

namespace App\Http\Controllers;

use App\Models\Favourite;
use App\Models\Series\Series;
use Illuminate\Http\Request;

class FavouriteController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $favourites = $user->favourites;

        return response()->json($favourites);
    }

    public function store(Request $request)
    {
        $user = auth()->user();

        if($request->get('is_series')) {
            $type = Series::findOrFail($request->get('id'));
        } else {
            $type = Movie::findOrFail($request->get('id'));
        }
        $fav = new Favourite();
        $fav->user_id = $user->id;
        $favourite = $type->favourites()->save($fav);


        return response()->json($favourite);
    }

    public function destroy($id)
    {
        $user = auth()->user();
        $favourite = Favourite::where('user_id', $user->id)->where('favouriteable_id', $id)->first();
        $favourite->delete();

        return response()->json(['message' => 'Favourite deleted']);
    }

    public function getHints()
    {
        $user = auth()->user();
        $favourites = $user->favourites;

        $genres = [];

        foreach($favourites as $favourite) {
            $genres[] = $favourite->favouriteable->genre;
        }

        $max = array_count_values($genres);
        $max = array_keys($max, max($max));

        if(count($max) > 1) {
            $series = Series::whereIn('genre_id', $max[0])->take(3)->get();
            $movies = Movie::whereIn('genre_id', $max[0])->take(3)->get();

            $max = [
                'genre' => $max[0],
            ];
        } else {
            $series = Series::take(3)->get();
            $movies = Movie::take(3)->get();
        }

        $max['series'] = $series;
        $max['movies'] = $movies;

        return response()->json($max);
    }
}
