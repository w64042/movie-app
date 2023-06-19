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
