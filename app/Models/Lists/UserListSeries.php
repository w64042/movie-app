<?php

namespace App\Models\Lists;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserListSeries extends Model
{
    use HasFactory;

    protected $table = 'list_series';

    protected $fillable = [
        'list_id',
        'series_id',
    ];

    public function list()
    {
        return $this->belongsTo('App\Models\Lists\UserList');
    }

    public function series()
    {
        return $this->belongsTo('App\Models\Series\Series');
    }
}
