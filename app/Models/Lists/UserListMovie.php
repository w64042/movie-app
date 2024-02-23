<?php

namespace App\Models\Lists;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserListMovie extends Model
{
    use HasFactory;

    protected $table = 'list_movies';

    protected $fillable = [
        'user_list_id',
        'movie_id',
    ];

    public function list()
    {
        return $this->belongsTo('App\Models\Lists\UserList', 'list_id', 'id');
    }

    public function movie()
    {
        return $this->belongsTo('App\Models\Movie\Movie');
    }

}
