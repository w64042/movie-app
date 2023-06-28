<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    use HasFactory;

    protected $table = 'subscription_levels';

    protected $fillable = [
        'name',
        'price',
    ];

    public function users()
    {
        return $this->hasMany('App\Models\User');
    }

    public function features()
    {
        return $this->hasMany('App\Models\SubscriptionFeature', 'subscription_level_id', 'id');
    }

}
