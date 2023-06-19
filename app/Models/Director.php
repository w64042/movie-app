<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Director extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function series()
    {
        return $this->belongsTo('App\Models\Series\Series');
    }

    public function movies()
    {
        return $this->belongsTo('App\Models\Movie\Movie');
    }
}
