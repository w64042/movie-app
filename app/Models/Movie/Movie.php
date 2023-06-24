<?php

namespace App\Models\Movie;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'year',
        'runtime',
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


}
