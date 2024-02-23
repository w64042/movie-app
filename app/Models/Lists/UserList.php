<?php

namespace App\Models\Lists;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserList extends Model
{
    use HasFactory;

    protected $table = 'lists';

    protected $fillable = [
        'title',
        'user_id',
    ];

    public function movies()
    {
        return $this->belongsToMany('App\Models\Movie\Movie', 'list_movies');
    }

    public function series()
    {
        return $this->belongsToMany('App\Models\Series\Series', 'list_series');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
