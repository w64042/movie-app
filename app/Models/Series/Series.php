<?php

namespace App\Models\Series;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Series extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'seasons',
        'episodes',
        'genre_id',
        'director_id',
    ];

    public function genres()
    {
        return $this->hasOne('App\Models\Genre');
    }

    public function directors()
    {
        return $this->hasOne('App\Models\Director');
    }

    public function favourites()
    {
        return $this->morphMany('App\Models\Favourite', 'favouriteable');
    }
}
