<?php

namespace App\Http\Controllers;

use App\Models\Favourite;
use App\Models\Movie\Movie;
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
        if($favourites !== null) {
            foreach($favourites as $favourite) {
                $favourite->favouriteable->genre ? $genres[] = $favourite->favouriteable->genre->id : null;
            }

            $max = array_count_values($genres);
            $max = array_keys($max, max($max));
        }

        if(isset($max)) {

            $series = Series::whereIn('genre_id', $max)->whereNotIn('id', $favourites->pluck('id'))->take(3)->get();
            $movies = Movie::whereIn('genre_id', $max)->whereNotIn('id', $favourites->pluck('id'))->take(3)->get();
            $results['genre'] = $max[0];
        } else {
            $max['genre'] = null;
            $series = Series::take(3)->get();
            $movies = Movie::take(3)->get();
        }

        $results['series'] = $series;
        $results['movies'] = $movies;

        return response()->json($results);
    }
}
