<?php

namespace App\Models\Lists;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class List extends Model
{
    use HasFactory;

    protected $table = 'lists';

    protected $fillable = [
        'title',
        'description',
        'user_id',
    ];

    public function movies()
    {
        return $this->belongsToMany('App\Models\Movie\Movie');
    }

    public function series()
    {
        return $this->belongsToMany('App\Models\Series\Series');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

}
